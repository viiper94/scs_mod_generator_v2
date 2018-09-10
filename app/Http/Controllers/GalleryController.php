<?php

namespace App\Http\Controllers;

use App\Chassis;
use Illuminate\Http\Request;

class GalleryController extends Controller{

    public function index(){
        $chassis = Chassis::with('dlc')->get();
        return view('gallery.index', [
            'chassis_list' => $chassis->groupBy('game')
        ]);
    }

    public function getInfo(Request $request){
        if($request->ajax() && $request->input('chassis')){
            $result = null;
            $chassis = Chassis::where('alias_short', $request->input('chassis'))->first();
            if($chassis->with_paint_job){
                $data = $chassis->getAvailablePaints();
            }elseif($chassis->with_accessory){
                $data = $chassis->getAvailableAccessories();
            }
            return response()->json([
                'result' => $data,
                'status' => 'OK'
            ]);
        }
        return false;
    }

}