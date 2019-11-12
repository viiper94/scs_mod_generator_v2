<?php

namespace App\Http\Controllers\Admin;

use App\Dlc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDlcController extends Controller{

    public function index(){
        return view('admin.dlc.index', [
            'dlc' => Dlc::all()
        ]);
    }

    public function delete(Request $request, $id = null){
        $dlc = Dlc::find($id);
        return $dlc->delete() ?
            redirect()->route('dlc')->with(['success' => 'DLC успішно видалено!']) :
            redirect()->route('dlc')->withErrors(['Не вдалось видалити DLC']);
    }

    public function toggle(Request $request, $id = null){
        $dlc = Dlc::find($id);
        $dlc->active = $dlc->active == '1' ? '0' : '1';
        return $dlc->save() ?
            redirect()->route('dlc')->with(['success' => 'Виконано!']) :
            redirect()->route('dlc')->withErrors(['Виникла помилка!']);
    }

    public function add(Request $request){
        if($request->method() === 'POST'){
            $dlc = new Dlc();
            $this->validate($request, [
                'game' => 'required|string',
                'name' => 'required|string',
                'short_name' => 'required|string',
                'type' => 'required|string',
            ]);
            $dlc->fill([
                'game' => $request->input('game', 'ets2'),
                'name' => $request->input('name'),
                'type' => $request->input('type'),
                'short_name' => $request->input('short_name'),
                'mp_support' => $request->input('mp_support') == 'on',
                'active' => $request->input('active') == 'on',
            ]);
            return $dlc->save() ?
                redirect()->route('dlc')->with(['success' => 'DLC успішно додано!']) :
                redirect()->back()->withErrors(['Не вдалось додати DLC']);
        }

        return view('admin.dlc.add', [
            'types' => Dlc::$types
        ]);
    }

}
