<?php

namespace App\Http\Controllers;

use App\Chassis;
use Illuminate\Http\Request;

class GalleryController extends Controller{

    public function index(){
        $chassis = Chassis::all();
        return view('gallery.index', [
            'chassis_list' => $chassis->groupBy('game')
        ]);
    }

    public function getInfo(Request $request){
        if($request->ajax() && $request->input('chassis')){
            $lang = $request->input('lang', null);
            $result = null;
            $chassis = Chassis::where('alias_short', $request->input('chassis'))->first();
            if($chassis->with_paint_job){
                $data = $chassis->getAvailablePaints($lang);
            }elseif($chassis->with_accessory){
                $data = $chassis->getAvailableAccessories($lang);
            }
            return response()->json([
                'result' => $data,
                'status' => 'OK'
            ]);
        }
        return false;
    }

}