<?php

namespace App\Http\Controllers\Admin;

use App\Chassis;
use App\Dlc;
use App\Http\Controllers\Controller;
use App\Wheel;
use Illuminate\Http\Request;

class AdminWheelsController extends Controller{

    public function index(Request $request){
        return view('admin.wheels.index', [
            'wheels' => Wheel::all()
        ]);
    }

    public function edit(Request $request, $id = null){
        $wheel = Wheel::find($id);
        if($request->method() === 'POST' && $id){
            $this->validate($request, [
                'game' => 'required|string',
                'def' => 'required|string',
                'alias' => 'required|string',
            ]);
            $wheel->fill([
                'game' => $request->input('game', 'ets2'),
                'def' => $request->input('def'),
                'alias' => $request->input('alias'),
                'dlc_id' => $request->input('dlc', null),
                'active' => $request->input('active') == 'on',
                'mp_support' => $request->input('mp_support') == 'on',
            ]);
            return $wheel->save() ?
                redirect()->route('wheels')->with(['success' => 'Колесо успішно відредаговано!']) :
                redirect()->back()->withErrors(['Виникла помилка']);
        }

        return view('admin.wheels.edit', [
            'wheel' => $wheel,
            'dlc' => Dlc::where(['active' => 1, 'game' => $wheel->game])->get()
        ]);
    }

    public function copy(Request $request, $id = null){
        $wheel = Wheel::find($id);
        $new_wheel = new Wheel();
        $new_wheel->fill([
            'game' => $wheel->game,
            'def' => $wheel->def,
            'alias' => $wheel->alias.'_copy',
            'dlc' => $wheel->dlc,
            'active' => false,
            'mp_support' => false,
        ]);

        return $new_wheel->save() ?
            redirect(route('wheels').'/edit/'.$new_wheel->id)->with(['success' => 'Колесо успішно скопійовано!']) :
            redirect()->route('wheels')->withErrors(['Не вдалось скопіювати колесо']);
    }

    public function delete(Request $request, $id = null){
        $wheel = Wheel::find($id);
        return $wheel->delete() ?
            redirect()->route('wheels')->with(['success' => 'Колесо успішно видалено!']) :
            redirect()->route('wheels')->withErrors(['Не вдалось видалити колесо']);
    }

    public function toggle(Request $request, $id = null){
        $wheel = Wheel::find($id);
        $wheel->active = $wheel->active == '1' ? '0' : '1';
        return $wheel->save() ?
            redirect()->route('wheels')->with(['success' => 'Виконано!']) :
            redirect()->route('wheels')->withErrors(['Виникла помилка!']);
    }

    public function add(Request $request){
        $wheel = new Wheel();

        if($request->method() === 'POST'){
            $this->validate($request, [
                'game' => 'required|string',
                'def' => 'required|string',
                'alias' => 'required|string',
            ]);
            $wheel->fill([
                'game' => $request->input('game', 'ets2'),
                'def' => $request->input('def'),
                'alias' => $request->input('alias'),
                'dlc_id' => $request->input('dlc', null),
                'active' => $request->input('active') == 'on',
                'mp_support' => $request->input('mp_support') == 'on'
            ]);
            if($wheel->save()) return redirect()->route('wheels')->with(['success' => 'Колесо успішно додано!']);
        }

        return view('admin.wheels.edit', [
            'wheel' => $wheel,
            'dlc' => Dlc::where(['active' => 1])->get()
        ]);
    }

}