<?php

namespace App\Http\Controllers\Admin;

use App\Accessory;
use App\Chassis;
use App\Dlc;
use App\Http\Controllers\Controller;
use App\Wheel;
use Illuminate\Http\Request;

class AdminAccessoriesController extends Controller{

    public function index(Request $request){
        $accessories = Accessory::with('chassisObj');
        if($request->input('q')) $accessories->where('def', 'like', '%'.$request->input('q').'%')
            ->orWhere('alias', 'like', '%'.$request->input('q').'%')
            ->orWhere('chassis', 'like', '%'.$request->input('q').'%');
        return view('admin.accessories.index', [
            'accessories' => $accessories->orderBy('id', 'desc')->paginate(20)
        ]);
    }

    public function edit(Request $request, $id = null){
        if($request->method() === 'POST' && $id){
            $this->validate($request, [
                'game' => 'required|string',
                'def' => 'required|string',
                'alias' => 'required|string',
                'name' => 'required|string',
                'chassis' => 'required|string',
            ]);
            $accessory = Accessory::find($id);
            $accessory->fill([
                'game' => $request->input('game', 'ets2'),
                'def' => $request->input('def'),
                'suffixes' => $request->input('suffixes'),
                'alias' => $request->input('alias'),
                'name' => $request->input('name'),
                'dlc' => $request->input('dlc') ? implode(',', $request->input('dlc')) : null,
                'chassis' => $request->input('chassis'),
                'active' => $request->input('active') == 'on',
            ]);
            return $accessory->save() ?
                redirect()->route('accessories')->with(['success' => 'Аксесуар успішно відредаговано!']) :
                redirect()->back()->withErrors(['Виникла помилка']);
        }

        $accessory = Accessory::where('id', $id)->first();
        return view('admin.accessories.edit', [
            'accessory' => $accessory,
            'dlc' => Dlc::where(['active' => 1, 'game' => $accessory->game])->get()
        ]);
    }

    public function copy(Request $request, $id = null){
        $accessory = Accessory::find($id);
        $new_accessory = new Accessory();
        $new_accessory->fill([
            'game' => $accessory->game,
            'def' => $accessory->def,
            'suffixes' => $accessory->suffixes,
            'chassis' => $accessory->chassis,
            'alias' => $accessory->alias,
            'name' => $accessory->name,
            'dlc' => $accessory->dlc,
            'active' => $accessory->active,
        ]);

        return $new_accessory->save() ?
            redirect(route('accessories').'/edit/'.$new_accessory->id)->with(['success' => 'Аксесуар успішно скопійовано!']) :
            redirect()->back()->withErrors(['Не вдалось скопіювати аксесуар']);
    }

    public function delete(Request $request, $id = null){
        $accessory = Accessory::find($id);
        return $accessory->delete() ?
            redirect()->back()->with(['success' => 'Аксесуар успішно видалено!']) :
            redirect()->back()->withErrors(['Не вдалось видалити аксесуар']);
    }

    public function toggle(Request $request, $id = null){
        $accessory = Accessory::find($id);
        $accessory->active = $accessory->active == '1' ? '0' : '1';
        return $accessory->save() ?
            redirect()->back()->with(['success' => 'Виконано!']) :
            redirect()->route('accessories')->withErrors(['Виникла помилка!']);
    }

    public function add(Request $request){
        $accessory = new Accessory();

        if($request->method() === 'POST'){
            $this->validate($request, [
                'game' => 'required|string',
                'def' => 'required|string',
                'alias' => 'required|string',
                'name' => 'required|string',
                'chassis' => 'required|string',
            ]);
            $accessory->fill([
                'game' => $request->input('game', 'ets2'),
                'def' => $request->input('def'),
                'suffixes' => $request->input('suffixes'),
                'alias' => $request->input('alias'),
                'name' => $request->input('name'),
                'chassis' => $request->input('chassis'),
                'dlc' => $request->input('dlc') ? implode(',', $request->input('dlc')) : null,
                'active' => $request->input('active') == 'on',
            ]);
            if($accessory->save()) return redirect()->route('accessories')->with(['success' => 'Аксесуар успішно додано!']);
        }

        return view('admin.accessories.edit', [
            'accessory' => $accessory,
            'dlc' => Dlc::where(['active' => 1])->get()
        ]);
    }

    public function import(){
        $asoc_names = [
            'brick_blue' => 'scs_brick',
            'flat_cont_g' => 'scs_container',
            'scs_flatbed' => 'flat_bed',

            'krone_boxliner_2x20' => 'krone_boxliner',
            'krone_boxliner_20' => 'krone_boxliner',
            'krone_boxliner_40' => 'krone_boxliner',
            'krone_profiliner_hd' => 'krone_profilinerhd',
        ];
        $path = resource_path('files/def');
        if(!is_dir($path)) return abort(404);
        $dlcs = Dlc::all()->keyBy('name')->toArray();

        //цикл по длс-кам
        foreach(scandir($path) as $dlc){
            if($dlc !== '.' && $dlc !== '..'){
                $dlc_params = $dlcs[$dlc] ?? null;
                $dlc_trailer_cargo_path = $path.'/'.$dlc.'/trailer_cargo/';
                if(!is_dir($dlc_trailer_cargo_path)) continue;

                // цикл по прицепам
                foreach(scandir($dlc_trailer_cargo_path) as $chassis){
                    if($chassis !== '.' && $chassis !== '..'){
                        $chassis_accessory_path = $dlc_trailer_cargo_path . '/' . $chassis;

                        // цикл по аксессуарам
                        foreach(scandir($chassis_accessory_path) as $acc){
                            if($acc !== '.' && $acc !== '..'){
                                $accessory = new Accessory();
                                $accessory->fill([
                                    'game' => $dlc_params['game'] ?? 'ets2',
                                    'def' => '/def/vehicle/trailer_cargo/'.(key_exists($chassis, $asoc_names) ? $asoc_names[$chassis] : $chassis).'/'.$acc,
                                    'alias' => str_replace(['.sii', '_13'], '', $acc),
                                    // TODO name
                                    'chassis' => $chassis,
                                    'dlc' =>  $dlc_params['id'],
                                    'active' => true,
                                ]);
//                                dump($accessory);
                                $accessory->save();
                            }
                        }
                    }
                }
            }
        }
//        die();
        return redirect()->route('accessories')->with(['success' => 'Аксесуари додано!']);
    }

    public function locale(){
        $content = json_decode(file_get_contents(resource_path('files/alias_to_cn.json')), true);
//        dd($content);
        foreach($content as $old => $new){
            $acc = Accessory::where('alias', $old)->get();
            foreach($acc as $accessory){
                $accessory->name = $new;
                $accessory->save();
            }
        }
        return redirect()->route('accessories')->with(['success' => 'Виконано!']);
    }

}
