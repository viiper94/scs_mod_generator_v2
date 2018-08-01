<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Chassis;
use App\Company;
use App\Dlc;
use App\Language;
use App\Paint;
use App\Wheel;
use I18n;
use Illuminate\Http\Request;

class TrailerGeneratorController extends Controller{

    public function index($game = 'ets2'){
        $errors = array();
        return view('generator', [
            'game' => $game,
            'chassis_list' => Chassis::where('game', $game)->get(),
            'wheels' => Wheel::where(['active' => 1, 'game' => $game])->get(),
            'dlc_list' => Dlc::where(['active' => 1, 'game' => $game])->get(),
            'langs' => Language::where('active', 1)->get()->keyBy('locale'),
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
                        'first' => I18n::t('choose_accessory')
                    ];
                }
                if($request->input('select') == 'paint'){
                    $chassis = null;
                    $data['paint'] = [
                        'echo' => Paint::getAllPaintsDefs($game),
                        'first' => I18n::t('all_companies')
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
                    'first' => I18n::t('choose_accessory', $lang)
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

}