<?php

namespace App\Http\Controllers;

use App\Chassis;
use App\Dlc;
use App\Mods;
use App\Paint;
use App\TrailerGenerator;
use App\TruckPaintGenerator;
use App\Wheel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TruckPaintGeneratorController extends Controller{

    public function index($game = 'ets2'){
        return view('generator.generator_paint', [
            'chassis_list' => Chassis::where(['with_paint_job' => '1', 'game' => 'ets2'])->with('dlc')->get(),
            'game' => $game,
            'wheels' => Wheel::where(['active' => 1, 'game' => $game])->with('dlc')->orderBy('sort', 'desc')->get(),
            'dlc_list' => Dlc::where(['active' => 1, 'game' => $game])->orderBy('sort', 'asc')->get()->groupBy('type')
        ]);
    }

    public function generate(Request $request){
        if($request->input('chassis') !== 'paintable'){
            $chassis = Chassis::where('alias', $request->input('chassis'))->first();
            $chassis->weight = $request->input('weight');
            $chassis->setWheels($request->input('wheels'));

            $paint_job = Paint::where('def', $chassis->default_paint_job)->first();
            $paint_job->setPaintColor($request->input('color'));
        }else{
            $chassis = new Chassis();
            $chassis->weight = $request->input('weight');
            $chassis->alias = 'paintable';
            $chassis->supports_wheels = true;
            $chassis->wheels = $request->input('wheels');

            $paint_job = new Paint();
            $paint_job->look = 'default';
            $paint_job->setPaintColor($request->input('color'));
        }
        $t_generator = new TrailerGenerator();
        $t_generator->load($chassis, null, $paint_job);
        $t_generator->zip = false;
        $outDir = $t_generator->run();

        $p_generator = new TruckPaintGenerator();
        $p_generator->load($chassis, $paint_job, $outDir);
        $p_generator->run();

        $mod = new Mods();
        Auth::check() ? $mod->user_id = Auth::id() : null;
        $mod->title = $t_generator->title;
        $mod->file_name = $p_generator->fileName;
        $mod->params = $this->getInputParams($request, $t_generator);
        $mod->type = 'paint';
        $mod->save();

        return redirect(($request->input('target') !== 'ats' ? '/color' : '/color/ats/').'?d='.$p_generator->fileName);
    }

    public function getDLC(Request $request, $game = 'ets2'){
        if($request->ajax() && $request->input('chassis')){
            if($request->input('chassis') == 'paintable'){
                $dlc = [];
                $wheels = true;
            }else{
                $chassis = Chassis::where('alias', $request->input('chassis'))->first();
                $dlc = $chassis->dlc;
                $wheels = $chassis->supports_wheels;
            }
            return response()->json(['status' => 'OK', 'dlc' => $dlc, 'wheels' => $wheels]);
        }
        return false;
    }

    public function getInputParams($request, $generator){
        $params = array();

        $params['form']['chassis'] = $request->post('chassis');

        $color = $request->post('color');
        $params['form']['color'] = $color;
        $params['view']['color'] = $color['hex'];

        if($request->post('weight')){
            $params['form']['weight'] = $generator->chassis->weight;
        }

        if($request->post('wheels')){
            $params['form']['wheels'] = $generator->chassis->wheels->def;
            $params['view']['wheels'] = $generator->chassis->wheels->alias;
        }

        if($request->post('dlc')){
            $params['form']['dlc'] = $request->post('dlc');
        }
        return serialize($params);
    }

}
