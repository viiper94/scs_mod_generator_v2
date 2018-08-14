<?php

namespace App\Http\Controllers;

use App\Chassis;
use Illuminate\Http\Request;

class TruckPaintGeneratorController extends Controller{

    public function index(){
        return view('truck_paint.index', [
            'chassis_list' => Chassis::where(['with_paint_job' => '1', 'game' => 'ets2'])->get()
        ]);
    }

    public function generate(){
        
    }

}
