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
        $accessories = Accessory::with('dlc');
        if($request->input('q')) $accessories->where('def', 'like', '%'.$request->input('q').'%')
            ->orWhere('alias', 'like', $request->input('q').'%')
            ->orWhere('chassis', 'like', $request->input('q').'%');
        return view('admin.accessories.index', [
            'accessories' => $accessories->paginate(20)
        ]);
    }

    public function edit(Request $request, $id = null){
        if($request->method() === 'POST' && $id){
            $this->validate($request, [
                'game' => 'required|string',
                'def' => 'required|string',
                'alias' => 'required|string',
                'chassis' => 'required|string',
            ]);
            $accessory = Accessory::find($id);
            $accessory->fill([
                'game' => $request->input('game', 'ets2'),
                'def' => $request->input('def'),
                'alias' => $request->input('alias'),
                'dlc_id' => $request->input('dlc_id', null),
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
            'chassis' => $accessory->chassis,
            'alias' => $accessory->alias.'_copy',
            'dlc_id' => $accessory->dlc_id,
            'active' => false,
        ]);

        return $new_accessory->save() ?
            redirect(route('accessories').'/edit/'.$new_accessory->id)->with(['success' => 'Аксесуар успішно скопійовано!']) :
            redirect()->back()->withErrors(['Не вдалось скопіювати аксесуар']);
    }

    public function delete(Request $request, $id = null){
        $accessory = Accessory::find($id);
        return $accessory->delete() ?
            redirect()->route('accessories')->with(['success' => 'Аксесуар успішно видалено!']) :
            redirect()->back()->withErrors(['Не вдалось видалити аксесуар']);
    }

    public function toggle(Request $request, $id = null){
        $accessory = Accessory::find($id);
        $accessory->active = $accessory->active == '1' ? '0' : '1';
        return $accessory->save() ?
            redirect()->route('accessories')->with(['success' => 'Виконано!']) :
            redirect()->route('accessories')->withErrors(['Виникла помилка!']);
    }

    public function add(Request $request){
        $accessory = new Accessory();

        if($request->method() === 'POST'){
            $this->validate($request, [
                'game' => 'required|string',
                'def' => 'required|string',
                'alias' => 'required|string',
                'chassis' => 'required|string',
            ]);
            $accessory->fill([
                'game' => $request->input('game', 'ets2'),
                'def' => $request->input('def'),
                'alias' => $request->input('alias'),
                'chassis' => $request->input('chassis'),
                'dlc_id' => $request->input('dlc_id', null),
                'active' => $request->input('active') == 'on',
            ]);
            if($accessory->save()) return redirect()->route('accessories')->with(['success' => 'Аксесуар успішно додано!']);
        }

        return view('admin.accessories.edit', [
            'accessory' => $accessory,
            'dlc' => Dlc::where(['active' => 1])->get()
        ]);
    }

}