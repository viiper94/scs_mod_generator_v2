<?php

namespace App\Http\Controllers\Admin;

use App\Dlc;
use App\Http\Controllers\Controller;
use App\Paint;
use Illuminate\Http\Request;

class AdminPaintsController extends Controller{

    public function index(Request $request){
        $paints = Paint::with(['chassisObj', 'dlc']);
        if($request->input('q')) $paints->where('def', 'like', '%'.$request->input('q').'%')
            ->orWhere('alias', 'like', $request->input('q').'%')
            ->orWhere('chassis', 'like', $request->input('q').'%');
        return view('admin.paints.index', [
            'paints' => $paints->orderBy('id', 'desc')->paginate(20)
        ]);
    }

    public function edit(Request $request, $id = null){
        $paint = Paint::find($id);

        if($request->method() === 'POST' && $id){
            $this->validate($request, [
                'game' => 'required|string',
                'def' => 'required|string',
                'alias' => 'required|string',
                'look' => 'required|string',
                'chassis' => 'required|string',
            ]);
            $paint->fill([
                'game' => $request->input('game', 'ets2'),
                'def' => $request->input('def'),
                'alias' => $request->input('alias'),
                'look' => $request->input('look'),
                'dlc_id' => $request->input('dlc_id', null),
                'chassis' => $request->input('chassis'),
                'with_color' => $request->input('with_color') == 'on',
                'active' => $request->input('active') == 'on',
            ]);
            return $paint->save() ?
                redirect()->route('paints')->with(['success' => 'Скін успішно відредаговано!']) :
                redirect()->back()->withErrors(['Виникла помилка']);
        }

        return view('admin.paints.edit', [
            'paint' => $paint,
            'dlc' => Dlc::where(['active' => 1, 'game' => $paint->game])->get()
        ]);
    }

    public function copy(Request $request, $id = null){
        $paint = Paint::find($id);
        $new_paint = new Paint();
        $new_paint->fill([
            'game' => $paint->game,
            'def' => $paint->def,
            'chassis' => $paint->chassis,
            'alias' => $paint->alias.'_copy',
            'look' => $paint->look.'_copy',
            'dlc_id' => $paint->dlc_id,
            'with_color' => $paint->with_color,
            'active' => false,
        ]);

        return $new_paint->save() ?
            redirect(route('paints').'/edit/'.$new_paint->id)->with(['success' => 'Скін успішно скопійовано!']) :
            redirect()->back()->withErrors(['Не вдалось скопіювати скін']);
    }

    public function delete(Request $request, $id = null){
        $paint = Paint::find($id);
        return $paint->delete() ?
            redirect()->back()->with(['success' => 'Скін успішно видалено!']) :
            redirect()->back()->withErrors(['Не вдалось видалити скін']);
    }

    public function toggle(Request $request, $id = null){
        $paint = Paint::find($id);
        $paint->active = $paint->active == '1' ? '0' : '1';
        return $paint->save() ?
            redirect()->back()->with(['success' => 'Виконано!']) :
            redirect()->route('paints')->withErrors(['Виникла помилка!']);
    }

    public function add(Request $request){
        $paint = new Paint();

        if($request->method() === 'POST'){
            $this->validate($request, [
                'game' => 'required|string',
                'def' => 'required|string',
                'alias' => 'required|string',
                'look' => 'required|string',
                'chassis' => 'required|string',
            ]);
            $paint->fill([
                'game' => $request->input('game', 'ets2'),
                'def' => $request->input('def'),
                'alias' => $request->input('alias'),
                'look' => $request->input('look'),
                'chassis' => $request->input('chassis'),
                'dlc_id' => $request->input('dlc_id', null),
                'with_color' => $request->input('with_color') == 'on',
                'active' => $request->input('active') == 'on',
            ]);
            if($paint->save()) return redirect()->route('paints')->with(['success' => 'Скін успішно додано!']);
        }

        return view('admin.paints.edit', [
            'paint' => $paint,
            'dlc' => Dlc::where(['active' => 1])->get()
        ]);
    }

    public function import(){
        $asoc_names = [
            'cement_cistern' => 'cement',
            'curtain_sider' => 'scs_box/curtain_sider',
            'dry_van' => 'scs_box/dry_van',
            'insulated' => 'scs_box/insulated',
            'moving_floor' => 'scs_box/moving_floor',
            'refrigerated' => 'scs_box/reefer',
            'willig_cistern' => 'willig/fuel_cistern',

            'krone_coolliner' => 'krone/coolliner',
            'krone_dryliner' => 'krone/dryliner',
            'krone_profiliner' => 'krone/profiliner',
        ];
        $path = resource_path('files/def');
        if(!is_dir($path)) return abort(404);
        $dlcs = Dlc::all()->keyBy('name')->toArray();

        // цикл по длс-кам
        foreach(scandir($path) as $dlc){
            if($dlc !== '.' && $dlc !== '..'){
                $dlc_params = $dlcs[$dlc] ?? null;
                $dlc_trailer_path = $path.'/'.$dlc.'/trailer/';

                // цикл по прицепам
                foreach(scandir($dlc_trailer_path) as $chassis){
                    if($chassis !== '.' && $chassis !== '..' && is_dir($dlc_trailer_path . '/' . $chassis . '/company_paint_job/')){
                        $chassis_paint_jobs_path = $dlc_trailer_path . '/' . $chassis . '/company_paint_job/';

                        // цикл по скинам
                        foreach(scandir($chassis_paint_jobs_path) as $paint_job){
                            if($paint_job !== '.' && $paint_job !== '..'){
                                $paint = new Paint();
                                $paint->fill([
                                    'game' => $dlc_params['game'] ?? 'ets2',
                                    'def' => '/def/vehicle/trailer/'.(key_exists($chassis, $asoc_names) ? $asoc_names[$chassis] : $chassis).'/company_paint_job/'.$paint_job,
                                    'alias' => str_replace('.sii', '', $paint_job),
                                    'look' => str_replace('.sii', '', $paint_job),
                                    'chassis' => $chassis,
                                    'dlc_id' => $dlc_params['id'],
                                    'active' => true,
                                ]);
                                if($paint_job === 'default.sii') $paint->sort = '1';
                                $paint->save();
//                                dump($paint);
                            }
                        }
                        if($chassis === 'schw_curtain' || $chassis === 'schw_reefer'){
                            $paint = new Paint();
                            $paint->fill([
                                'game' => 'ets2',
                                'def' => '/def/trailer/'.$chassis.'/custom_paint_job/schw_logo.sii',
                                'alias' => 'schw_logo',
                                'look' => 'empty',
                                'chassis' => $chassis,
                                'dlc_id' => $dlcs['schwarzmuller']['id'],
                                'active' => true,
                                'sort' => 1
                            ]);
                            $paint->save();
//                            dump($paint);
                        }
                    }
                }
            }
        }
        return redirect()->route('paints')->with(['success' => 'Скіни додано!']);
    }

}