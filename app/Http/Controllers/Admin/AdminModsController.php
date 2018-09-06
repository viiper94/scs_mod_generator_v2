<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use App\Mods;
use Illuminate\Http\Request;

class AdminModsController extends Controller{

    public function index(){
        return view('admin.mods.index', [
            'mods' => Mods::with('user')->get()
        ]);
    }

    public function delete(Request $request, $id = null){
        $mod = Mods::find($id);
        return $mod->delete() ?
            redirect()->route('mods')->with(['success' => 'Мод успішно видалено!']) :
            redirect()->route('mods')->withErrors(['Не вдалось видалити мод']);
    }

    public function mark(Request $request, $id){
        $mod = Mods::findOrFail($id);
        $this->authorize('mark', $mod);

        return $mod->markMod() ?
            redirect()->route('mods')->with(['success' => 'Виконано!']) :
            redirect()->route('mods')->withErrors(['Помилка']);
    }

}