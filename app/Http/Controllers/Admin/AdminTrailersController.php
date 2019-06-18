<?php

namespace App\Http\Controllers\Admin;

use App\Chassis;
use App\Dlc;
use App\Http\Controllers\Controller;
use App\Wheel;
use Illuminate\Http\Request;

class AdminTrailersController extends Controller{

    public $trailers = [
        0 => [
            'def' => null,
            'axles' => null,
            'body' => null,
            'suitable_suffix' => null,
            'with_accessory' => 'off',
            'with_paint_job' => 'off',
            'accessories' => [
                0 => [
                    'name' => null,
                    'def' => null,
                ]
            ]
        ]
    ];

    public function index(Request $request){
        $chassis = Chassis::select(['*']);
        if($request->input('q')) $chassis->where('trailers', 'like', '%'.$request->input('q').'%')
            ->orWhere('alias', 'like', $request->input('q').'%');
        return view('admin.trailers.index', [
            'chassis_list' => $chassis->orderBy('updated_at', 'desc')->paginate(20)
        ]);
    }

    public function edit(Request $request, $id = null){
        if($request->method() === 'POST' && $id){
            $this->validate($request, [
                'game' => 'required|string',
                'alias' => 'required|string',
                'wheels_id' => 'required|numeric',
                'default_paint_job' => 'required_if:with_paint_job,on',
            ]);
            $chassis = Chassis::find($id);
            $chassis->fill([
                'game' => $request->input('game', 'ets2'),
                'alias' => $request->input('alias'),
                'alias_short' => $request->input('alias_short', $request->input('alias')),
                'accessory_subgroup' => $request->input('accessory_subgroup', null),
                'alias_short_paint' => $request->input('alias_short_paint', $request->input('alias')),
                'default_paint_job' => $request->input('default_paint_job', null),
                'wheels_id' => $request->input('wheels_id'),
                'dlc_id' => $request->input('dlc_id', null),
                'supports_wheels' => $request->input('supports_wheels') == 'on',
                'coupled' => $request->input('coupled') == 'on',
                'with_accessory' => $request->input('with_accessory') == 'on',
                'with_paint_job' => $request->input('with_paint_job') == 'on',
                'can_random' => $request->input('can_random') == 'on',
                'can_empty' => $request->input('can_empty') == 'on',
                'can_all_companies' => $request->input('can_all_companies') == 'on',
                'mp_support' => $request->input('mp_support') == 'on',
                'active' => $request->input('active') == 'on',
                'trailers' => array_values($request->input('trailers'))
            ]);
            return $chassis->save() ?
                redirect()->route('trailers')->with(['success' => 'Причіп успішно відредаговано!']) :
                redirect()->back()->withErrors(['Виникла помилка']);
        }

        $chassis = Chassis::where('id', $id)->first();
        return view('admin.trailers.edit', [
            'chassis' => $chassis,
            'trailers' => $chassis->trailers ?? $this->trailers,
            'wheels' => Wheel::where(['game' => $chassis->game])->get(),
            'dlc' => Dlc::where(['game' => $chassis->game])->get()
        ]);
    }

    public function copy(Request $request, $id = null){
        $chassis = Chassis::find($id);
        $new_chassis = new Chassis();
        $new_chassis->fill([
            'game' => $chassis->game,
            'def' => $chassis->def,
            'alias' => $chassis->alias.'_copy',
            'alias_short' => $chassis->alias,
            'accessory_subgroup' => $chassis->accessory_subgroup,
            'alias_short_paint' => $chassis->alias,
            'axles' => $chassis->axles,
            'default_paint_job' => $chassis->default_paint_job,
            'wheels_id' => $chassis->wheels_id,
            'dlc_id' => $chassis->dlc_id,
            'supports_wheels' => $chassis->supports_wheels,
            'active' => false,
            'coupled' => $chassis->coupled,
            'can_empty' => $chassis->can_empty,
            'can_all_companies' => $chassis->can_all_companies,
            'with_accessory' => $chassis->with_accessory,
            'with_paint_job' => $chassis->with_paint_job,
            'trailer_owned' => $chassis->trailer_owned,
            'can_random' => $chassis->can_random,
            'mp_support' => $chassis->mp_support,
            'trailers' => $chassis->trailers,
        ]);

        return $new_chassis->save() ?
            redirect(route('trailers').'/edit/'.$new_chassis->id)->with(['success' => 'Причіп успішно скопійовано!']) :
            redirect()->route('trailers')->withErrors(['Не вдалось скопіювати причіп']);
    }

    public function delete(Request $request, $id = null){
        $chassis = Chassis::find($id);
        return $chassis->delete() ?
            redirect()->route('trailers')->with(['success' => 'Причіп успішно видалено!']) :
            redirect()->route('trailers')->withErrors(['Не вдалось видалити причіп']);
    }

    public function toggle(Request $request, $id = null){
        $chassis = Chassis::find($id);
        $chassis->active = $chassis->active == '1' ? '0' : '1';
        return $chassis->save() ?
            redirect()->back()->with(['success' => 'Виконано!']) :
            redirect()->back()->withErrors(['Виникла помилка!']);
    }

    public function add(Request $request){
        $chassis = new Chassis();
        if($request->method() === 'POST'){
            $this->validate($request, [
                'game' => 'required|string',
                'alias' => 'required|string',
                'wheels_id' => 'required|numeric',
                'default_paint_job' => 'required_if:with_paint_job,on',
            ]);
            $chassis->fill([
                'game' => $request->input('game', 'ets2'),
                'def' => $request->input('def'),
                'alias' => $request->input('alias'),
                'alias_short' => $request->input('alias_short', $request->input('alias')),
                'accessory_subgroup' => $request->input('accessory_subgroup', null),
                'alias_short_paint' => $request->input('alias_short_paint', $request->input('alias')),
                'axles' => $request->input('axles'),
                'default_paint_job' => $request->input('default_paint_job', null),
                'wheels_id' => $request->input('wheels_id'),
                'dlc_id' => $request->input('dlc_id', null),
                'supports_wheels' => $request->input('supports_wheels') == 'on',
                'active' => $request->input('active') == 'on',
                'coupled' => $request->input('coupled') == 'on',
                'can_empty' => $request->input('can_empty') == 'on',
                'can_all_companies' => $request->input('can_all_companies') == 'on',
                'with_accessory' => $request->input('with_accessory') == 'on',
                'with_paint_job' => $request->input('with_paint_job') == 'on',
                'trailer_owned' => $request->input('trailer_owned') == 'on',
                'can_random' => $request->input('can_random') == 'on',
                'mp_support' => $request->input('mp_support') == 'on',
                'trailers' => array_values($request->input('trailers'))
            ]);
            if($chassis->save()) return redirect()->route('trailers')->with(['success' => 'Причіп успішно додано!']);
        }

        return view('admin.trailers.edit', [
            'chassis' => $chassis,
            'trailers' => $this->trailers,
            'wheels' => Wheel::where(['active' =>  1])->get(),
            'dlc' => Dlc::where(['active' => 1])->get()
        ]);
    }

}