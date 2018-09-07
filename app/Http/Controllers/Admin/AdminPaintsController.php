<?php

namespace App\Http\Controllers\Admin;

use App\Accessory;
use App\Chassis;
use App\Dlc;
use App\Http\Controllers\Controller;
use App\Paint;
use App\Wheel;
use Illuminate\Http\Request;

class AdminPaintsController extends Controller{

    public function index(Request $request){
        $paints = Paint::with(['chassisObj', 'dlc']);
        if($request->input('q')) $paints->where('def', 'like', '%'.$request->input('q').'%')
            ->orWhere('alias', 'like', $request->input('q').'%')
            ->orWhere('chassis', 'like', $request->input('q').'%');
        return view('admin.paints.index', [
            'paints' => $paints->paginate(20)
        ]);
    }

    public function edit(Request $request, $id = null){
        if($request->method() === 'POST' && $id){
            $this->validate($request, [
                'game' => 'required|string',
                'def' => 'required|string',
                'alias' => 'required|string',
                'look' => 'required|string',
                'chassis' => 'required|string',
            ]);
            $paint = Paint::find($id);
            $paint->fill([
                'game' => $request->input('game', 'ets2'),
                'def' => $request->input('def'),
                'alias' => $request->input('alias'),
                'look' => $request->input('look'),
                'dlc_id' => $request->input('dlc_id', null),
                'chassis' => $request->input('chassis'),
                'active' => $request->input('active') == 'on',
            ]);
            return $paint->save() ?
                redirect()->route('paints')->with(['success' => 'Скін успішно відредаговано!']) :
                redirect()->back()->withErrors(['Виникла помилка']);
        }

        $paint = Paint::where('id', $id)->first();
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
                'active' => $request->input('active') == 'on',
            ]);
            if($paint->save()) return redirect()->route('paints')->with(['success' => 'Скін успішно додано!']);
        }

        return view('admin.paints.edit', [
            'paint' => $paint,
            'dlc' => Dlc::where(['active' => 1])->get()
        ]);
    }

}