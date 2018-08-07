<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Chassis;
use App\Company;
use App\Dlc;
use App\Paint;
use App\TrailerGenerator;
use App\Wheel;
use I18n;
use Illuminate\Http\Request;

class TrailerGeneratorController extends Controller{

    public function index($game = 'ets2'){
        if($game !== 'ats' && $game !== 'ets2') return redirect('/');
        $errors = array();
        return view('generator.index', [
            'game' => $game,
            'chassis_list' => Chassis::where('game', $game)->get(),
            'wheels' => Wheel::where(['active' => 1, 'game' => $game])->get(),
            'dlc_list' => Dlc::where(['active' => 1, 'game' => $game])->get(),
            'errors' => $errors
        ]);
    }

    public function getChassisData(Request $request, $game = 'ets2'){
        if($request->ajax() && $request->input('chassis')){
            $lang = $request->input('lang', null);

            if($request->input('all') == 'true'){
                if($request->input('select') == 'accessory'){
                    $chassis = null;
                    $data['accessory'] = [
                        'echo' => Accessory::getAllAccessoriesDefs($game),
                        'first' => trans('choose_accessory')
                    ];
                }
                if($request->input('select') == 'paint'){
                    $chassis = null;
                    $data['paint'] = [
                        'echo' => Paint::getAllPaintsDefs($game),
                        'first' => trans('all_companies')
                    ];
                }
                return response()->json(['result' => $data, 'status' => 'OK']);
            }
            if($request->input('accessory')){
                if($request->input('chassis') !== 'paintable'){
                    $chassis = Chassis::where('alias', $request->input('chassis'))->first();
                }
                if($request->input('chassis') !== 'paintable' && $chassis->with_accessory){
                    $accessory = Accessory::where('def', $request->input('accessory'))->first();
                    $dlc = $accessory->getDLCs(true);
                }
                if($request->input('chassis') === 'paintable' || $chassis->with_paint_job){
                    if($request->input('chassis') === 'paintable'){
                        $paint = Company::where('name', $request->input('accessory'))->first();
                    }else{
                        $paint = Paint::where('def', $request->input('accessory'))->first();
                    }
                    $dlc = $paint->dlc ? array($paint->dlc->name) : [];
                }
                !isset($chassis) ? : array_push($dlc, $chassis->dlc);
                return response()->json(['status' => 'OK', 'dlc' => array_unique($dlc)]);
            }
            if($request->input('chassis') == 'paintable'){
                $data['paint'] = [
                    'echo' => Chassis::getAllCompanies($lang, $game)
                ];
                return response()->json(['result' => $data, 'status' => 'OK', 'dlc' => []]);
            }
            $chassis = Chassis::where('alias', $request->input('chassis'))->first();
            $target = null;
            $data = null;
            if($chassis->with_accessory){
                $data['accessory'] = [
                    'echo' => $chassis->getAvailableAccessories($lang),
                    'first' => trans('choose_accessory', $lang)
                ];
            }
            if($chassis->with_paint_job){
                $data['paint'] = [
                    'echo' => $chassis->getAvailablePaints($lang)
                ];
            }
            return response()->json(['result' => $data, 'status' => 'OK', 'dlc' => $chassis->dlc]);
        }
        return false;
    }

    public function generate(Request $request){
        $accessory = null;
        $paint_job = null;

        if($request->input('chassis') !== 'paintable'){
            $chassis = Chassis::where('alias', $request->input('chassis'))->first();
            $chassis->weight = $request->input('weight');
            $chassis->setWheels($request->input('wheels'));
        }else{
            $chassis = new Chassis();
            $chassis->weight = $request->input('weight');
            $chassis->alias = 'paintable';
            $chassis->supports_wheels = true;
            $chassis->wheels = $request->input('wheels');

            $paint_job = new Paint();
            $paint_job->look = $request->input('paint');
            $paint_job->setPaintColor($request->input('color'));
        }

        if($chassis->with_accessory) $accessory = Accessory::where('def', $request->input('accessory'))->first();
        if($chassis->with_paint_job && $request->input('paint') !== 'all'){
            $paint_job = Paint::where('def', $request->input('paint'))->first();
            $paint_job->setPaintColor($request->input('color'));
        }
        if($chassis->alias == 'aero_dynamic' || $request->input('paint') === 'all'){
            $paint_job = new Paint();
            $paint_job->def = $chassis->default_paint_job;
            $paint_job->allCompanies = true;
            $paint_job->look = 'default';
        }

        $generator = new TrailerGenerator();
        $generator->load($chassis, $accessory, $paint_job);
        $generator->run();

//        $logger = new Logger();
//        $logger->writeLog($generator->fileName);

        return redirect()->action('TrailerGeneratorController@index');
    }

}