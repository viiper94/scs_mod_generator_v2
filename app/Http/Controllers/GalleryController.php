<?php

namespace App\Http\Controllers;

use App\Chassis;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller{

    public function index(Request $request){
        $chassis = Chassis::with('dlc', 'favoriteTo');
        if($request->input('q')) $chassis->orWhere('alias', 'like', '%'.$request->input('q').'%')
            ->orWhere('trailers', 'like', '%'.$request->input('q').'%');
        return view('gallery.index', [
            'chassis_list' => $chassis->where(['active' => 1])->orderBy('alias', 'asc')->get()->groupBy('game')->reverse()
        ]);
    }

    public function getInfo(Request $request){
        if($request->ajax() && $request->input('chassis')){
            $result = null;
            $chassis = Chassis::where('alias_short', $request->input('chassis'))->first();
            $data = array();
            if($chassis->with_paint_job){
                $data['paints'] = $chassis->getAvailablePaints();
            }
            if($chassis->with_accessory){
                $data['accessories'] = $chassis->getAvailableAccessories();
            }
            return response()->json([
                'result' => $data,
                'status' => 'OK'
            ]);
        }
        return false;
    }

    public function favorite(Request $request){
        $user = User::with('favorite')->findOrFail(Auth::id());
        $chassis = Chassis::where('alias', $request->post('chassis'))->firstOrFail();
        if($user->favorite->contains($chassis->id)){
            $user->favorite()->detach($chassis->id);
            $data = [
                'favorite' => false,
                'string' => $chassis->translate().' '.trans('general.removed_favorite'),
            ];
        }else{
            $user->favorite()->attach($chassis->id);
            $data = [
                'favorite' => true,
                'string' => $chassis->translate().' '.trans('general.added_favorite'),
            ];
        }
        return response()->json([
            'status' => 'OK',
            'data' => $data
        ]);
    }

}
