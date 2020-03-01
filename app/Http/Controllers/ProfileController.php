<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Chassis;
use App\Dlc;
use App\Image;
use App\Mods;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller{

    public function index(Request $request, $id = null){
        if(!Auth::check()) return redirect('/login');
        if(isset($id) && Gate::denies('admin')) return redirect()->route('profile');
        $user = isset($id) ? User::find($id) : Auth::user();
        $mods = Mods::where('user_id', $user->id)->orderBy('created_at', 'desc');
        return view('profile.profile', [
            'user' => $user,
            'mods_count' => $mods->count(),
            'mods' => $mods->limit(5)->get()
        ]);
    }

    public function edit(){
        if(!Auth::check()) return redirect('/login');
        return view('profile.edit', [
            'user' => Auth::user(),
            'dlc_list' => Dlc::where('active', 1)->orderBy('sort', 'asc')->get()->groupBy(['game', 'type'])
        ]);
    }

    public function editProfile(Request $request){
        if(!Auth::check()) return redirect('/login');
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::id(),
            'img' => 'file|image|dimensions:max_width=3000,max_height=3000|max:5500'
        ]);
        $user = User::find(Auth::id());
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->hasFile('img')){
            $file = $request->file('img');
            if($file->getSize() <= 5500000){
                $img = new Image();
                $img->load($file->getPathName());
                $img->resizeToHeight(250);
                $img->save(public_path().'/images/users/'.time().'.'.$file->getClientOriginalExtension());
                if($user->image && file_exists(public_path().'/images/users/'.$user->image)){
                    unlink(public_path().'/images/users/'.$user->image);
                }
                $user->image = time().'.'.$file->getClientOriginalExtension();
            }
        }
        return $user->save() ?
            redirect()->route('profile')->with(['success' => '!']) :
            redirect()->route('profile')->withErrors(['!']);
    }

    public function editPassword(Request $request){
        if(!Auth::check()) return redirect('/login');
        $user = User::find(Auth::id());
        if(!$user->hasOldPassword() || $user->hasOldPassword()
            && Hash::check($request->input('old_password'), $user->password)){
            $validate = [
                'new_password' => 'required|string|max:255|confirmed',
                'new_password_confirmation' => 'required|string|max:255'
            ];
            if($user->hasOldPassword()){
                $validate['old_password'] = 'required|string|max:255';
                $validate['new_password'] .= '|different:old_password';
            }
            $this->validate($request, $validate);
            $user->password = Hash::make($request->input('new_password'));
            return $user->save() ?
                redirect()->route('profile')->with(['success' => '!']) :
                redirect()->route('profile')->withErrors(['!']);
        }else{
            return redirect()->back()->withErrors([
                'old_password' => trans('user.old_pass_fail')
            ]);
        }
    }

    public function editSettings(Request $request){
        if(!Auth::check()) return redirect('/login');
        $user = User::find(Auth::id());
        $user->language = $request->input('lang');
        $user->owned_dlc =$request->input('dlc') ?
            implode(',', array_keys($request->input('dlc'))):
            null;
        return $user->save() ?
            redirect()->route('profile')->with(['success' => '!']) :
            redirect()->route('profile')->withErrors(['!']);
    }

    public function modBroken(Request $request, $id){
        $mod = Mods::findOrFail($id);
        $this->authorize('mark', $mod);

        return $mod->markMod() ?
            redirect()->route('profile_mods')->with(['success' => '!']) :
            redirect()->route('profile_mods')->withErrors(['!']);
    }

    public function getModInfo(Request $request){
        if($request->ajax() && $request->input('id')){
            $mod = Mods::find($request->input('id'));
            $params = unserialize($mod->params);
            $chassis_alias = $params['form']['chassis'];
            $accessory_name = '';
            if(key_exists('accessory', $params['form'])){
                $accessory_def = $params['form']['accessory'];
                $accessory = Accessory::getAccessoryByDef($accessory_def);
                $accessory_name = $accessory ? $accessory->translate() : null;
            }
            if($chassis_alias !== 'paintable'){
                $chassis = Chassis::getChassisByAlias($chassis_alias);
                $chassis_name = $chassis ? $chassis->translate() : null;
            }else{
                $chassis_name = trans('general.paintable_chassis');
            }
            return response()->json([
                'regenerate' => $mod->canRegenerate(),
                'chassis_name' => $chassis_name,
                'accessory_name' => $accessory_name,
                'status' => 'OK',
            ]);
        }
        return false;
    }

    public function mods(Request $request, $id = null){
        if(!Auth::check()) return redirect('/login');
        if(isset($id) && Gate::denies('admin')) return redirect()->route('profile');
        $user = isset($id) ? User::find($id) : Auth::user();
        return view('profile.mods', [
            'mods' => Mods::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(20)
        ]);
    }

}
