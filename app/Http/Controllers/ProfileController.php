<?php

namespace App\Http\Controllers;

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
        return view('profile.profile', [
            'user' => $user,
            'mods' => Mods::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(20)
        ]);
    }

    public function edit(){
        if(!Auth::check()) return redirect('/login');
        return view('profile.edit', ['user' => Auth::user()]);
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
                $img->resizeToHeight(200);
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
        if (Hash::check($request->input('old_password'), Auth::user()->password)) {
            $this->validate($request, [
                'old_password' => 'required|string|max:255',
                'new_password' => 'required|string|max:255|confirmed|different:old_password',
                'new_password_confirmation' => 'required|string|max:255'
            ]);
            $user = User::find(Auth::id());
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

    public function modBroken(Request $request, $id){
        $mod = Mods::findOrFail($id);
        $this->authorize('mark', $mod);

        return $mod->markMod() ?
            redirect()->route('profile')->with(['success' => '!']) :
            redirect()->route('profile')->withErrors(['!']);
    }

}