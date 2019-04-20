<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Chassis;
use App\Company;
use App\Dlc;
use App\Mods;
use App\Paint;
use App\TrailerGenerator;
use App\Wheel;
use I18n;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrailerGeneratorController extends Controller{

    public function index($game = 'ets2'){
        if($game !== 'ats' && $game !== 'ets2') abort(404);
        return view('generator.generator_trailer', [
            'game' => $game,
            'chassis_list' => Chassis::where(['game' => $game, 'active' => 1])->with('dlc')->orderBy('dlc_id', 'asc')->orderBy('alias_short', 'asc')->get(),
            'wheels' => Wheel::where(['active' => 1, 'game' => $game])->with('dlc')->orderBy('sort', 'desc')->get(),
            'dlc_list' => Dlc::where(['active' => 1, 'game' => $game])->whereIn('type', ['map', 'trailer'])->orderBy('sort', 'asc')->get()->groupBy('type')
        ]);
    }

    public function getChassisData(Request $request, $game = 'ets2'){
        if($request->ajax() && $request->input('chassis')){

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
                $dlc = [];
                if($request->input('chassis') !== 'paintable'){
                    $chassis = Chassis::where('alias', $request->input('chassis'))->first();
                }
                if($request->input('chassis') !== 'paintable' && $chassis->with_accessory){
                    $accessory = Accessory::where('def', $request->input('accessory'))->first();
                    if($accessory) $dlc = $accessory->getDLCs(true);
                }
                if($request->input('chassis') === 'paintable' || $chassis->with_paint_job){
                    if($request->input('chassis') === 'paintable'){
                        $paint = Company::where('name', $request->input('accessory'))->orderBy('name', 'asc')->first();
                    }else{
                        $paint = Paint::where('def', $request->input('accessory'))->first();
                    }
                    if($paint) $dlc = $paint->dlc ? array($paint->dlc->name) : [];
                }
                !isset($chassis->dlc) ? : array_push($dlc, $chassis->dlc->name);
                return response()->json(['status' => 'OK', 'dlc' => array_unique($dlc)]);
            }
            if($request->input('chassis') == 'paintable'){
                $data['paint'] = [
                    'echo' => Chassis::getAllCompanies($game)
                ];
                return response()->json(['result' => $data, 'status' => 'OK', 'dlc' => [], 'wheels' => true]);
            }
            $chassis = Chassis::where('alias', $request->input('chassis'))->first();
            $target = null;
            $data = null;
            if($chassis->with_accessory){
                $data['accessory'] = [
                    'echo' => $chassis->getAvailableAccessories(),
                ];
            }
            if($chassis->with_paint_job){
                $data['paint'] = [
                    'echo' => $chassis->getAvailablePaints()
                ];
            }
            return response()->json([
                'result' => $data,
                'status' => 'OK',
                'dlc' => $chassis->dlc,
                'wheels' => $chassis->supports_wheels
            ]);
        }
        return false;
    }

    public function generate(Request $request){

        $this->validate($request, [
            'chassis' => 'required|string',
            'target' => 'required|string',
            'title' => 'string|nullable',
            'accessory' => 'string|nullable',
            'paint' => 'string|nullable',
            'wheels' => 'string|nullable',
            'color' => 'array',
            'dlc' => 'array',
            'img' => 'file|image|dimensions:max_width=3000,max_height=3000|max:5500'
        ]);

        $accessory = null;
        $paint_job = null;

        if($request->input('chassis') !== 'paintable'){
            $chassis = Chassis::where('alias', $request->input('chassis'))->first();
            $chassis->setWheels($request->input('wheels'));
        }else{
            $chassis = new Chassis();
            $chassis->alias = 'paintable';
            $chassis->supports_wheels = true;
            $chassis->wheels = $request->input('wheels');

            $paint_job = new Paint();
            $paint_job->look = $request->input('paint');
            $paint_job->setPaintColor($request->input('color'));
        }

        if($chassis->with_accessory) $accessory = Accessory::where('def', $request->input('accessory'))->first();
        if(($chassis->with_paint_job || $chassis->alias == 'paintable') && $request->input('paint') !== 'all'){
            $paint_job = Paint::where('def', $request->input('paint'))->first();
            $paint_job->setPaintColor($request->input('color'));
        }
        if($request->input('paint') === 'all'){
            $paint_job = new Paint();
            $paint_job->def = $chassis->default_paint_job;
            $paint_job->allCompanies = true;
            $paint_job->look = 'default';
        }

        $generator = new TrailerGenerator();
        $generator->load($chassis, $accessory, $paint_job);
        $generator->run();

        $mod = new Mods();
        Auth::check() ? $mod->user_id = Auth::id() : null;
        $mod->title = $generator->title;
        $mod->file_name = $generator->fileName;
        $mod->params = $this->getInputParams($request, $generator);
        $mod->type = 'trailer';
        $mod->game = $request->input('target');
        $mod->save();

        return redirect(($request->input('target') !== 'ats' ? '/' : '/ats/').'?d='.$generator->fileName);
    }

    public function getInputParams($request, $generator){
        $params = array();

        $params['form']['chassis'] = $request->post('chassis');

        if($request->post('accessory')){
            $params['form']['accessory'] = $generator->accessory->def;
            $params['view']['accessory'] = $generator->accessory->alias;
        }

        if($request->post('paint')) {
            $params['form']['paint'] = $generator->paintJob->def ?? $generator->paintJob->look;
            $params['view']['paint'] = $generator->paintJob->alias ?? $generator->paintJob->look;
            if(stripos($request->post('paint'), 'default.sii')) {
                $color = $request->post('color');
                $params['form']['color'] = $color;
                $params['view']['color'] = $color['hex'];
            }
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