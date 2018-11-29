<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Dlc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCompaniesController extends Controller{

    public function index(Request $request){
        $companies = Company::with('dlc');
        if($request->input('q')) $companies->where('name', 'like', $request->input('q').'%');
        return view('admin.companies.index', [
            'companies' => $companies->paginate(20)
        ]);
    }

    public function edit(Request $request, $id = null){
        $company = Company::find($id);

        if($request->method() === 'POST' && $id){
            $this->validate($request, [
                'game' => 'required|string',
                'name' => 'required|string',
            ]);
            $company->fill([
                'game' => $request->input('game', 'ets2'),
                'name' => $request->input('name'),
                'dlc_id' => $request->input('dlc_id', null),
                'active' => $request->input('active') == 'on',
            ]);
            return $company->save() ?
                redirect()->route('companies')->with(['success' => 'Компанія успішно відредагована!']) :
                redirect()->back()->withErrors(['Виникла помилка']);
        }

        return view('admin.companies.edit', [
            'company' => $company,
            'dlc' => Dlc::where(['active' => 1, 'game' => $company->game])->get()
        ]);
    }

    public function copy(Request $request, $id = null){
        $company = Company::find($id);
        $new_company = new Company();
        $new_company->fill([
            'game' => $company->game,
            'name' => $company->name.'_copy',
            'dlc_id' => $company->dlc_id,
            'active' => false,
        ]);

        return $new_company->save() ?
            redirect(route('companies').'/edit/'.$new_company->id)->with(['success' => 'Компанію успішно скопійовано!']) :
            redirect()->back()->withErrors(['Не вдалось скопіювати компанію']);
    }

    public function delete(Request $request, $id = null){
        $company = Company::find($id);
        return $company->delete() ?
            redirect()->back()->with(['success' => 'Компанію успішно видалено!']) :
            redirect()->back()->withErrors(['Не вдалось видалити компанію']);
    }

    public function toggle(Request $request, $id = null){
        $company = Company::find($id);
        $company->active = $company->active == '1' ? '0' : '1';
        return $company->save() ?
            redirect()->back()->with(['success' => 'Виконано!']) :
            redirect()->route('companies')->withErrors(['Виникла помилка!']);
    }

    public function add(Request $request){
        $company = new Company();

        if($request->method() === 'POST'){
            $this->validate($request, [
                'game' => 'required|string',
                'name' => 'required|string',
            ]);
            $company->fill([
                'game' => $request->input('game', 'ets2'),
                'name' => $request->input('name'),
                'dlc_id' => $request->input('dlc_id', null),
                'active' => $request->input('active') == 'on',
            ]);
            if($company->save()) return redirect()->route('companies')->with(['success' => 'Компанію успішно додано!']);
        }

        return view('admin.companies.edit', [
            'company' => $company,
            'dlc' => Dlc::where(['active' => 1])->get()
        ]);
    }

    public function import(){
        $path = resource_path('files/def');
        if(!is_dir($path)) return abort(404);
        $dlcs = Dlc::all()->keyBy('name')->toArray();

        // цикл по длс-кам
        foreach(scandir($path) as $dlc){
            if($dlc !== '.' && $dlc !== '..' && is_dir($path.'/'.$dlc.'/company/')){
                $dlc_params = $dlcs[$dlc] ?? null;
                $dlc_company_path = $path.'/'.$dlc.'/company/';

                // цикл по компаниям
                foreach(scandir($dlc_company_path) as $item){
                    if($item !== '.' && $item !== '..'){
                        $company = new Company();
                        $company->fill([
                            'game' => $dlc_params['game'] ?? 'ets2',
                            'name' => preg_replace('%(\.[a-z_]+)?.sii%', '', $item),
                            'dlc_id' => $dlc_params['id'],
                            'active' => true,
                        ]);
                        $company->save();
//                        dump($company);
                    }
                }
            }
        }
        return redirect()->route('companies')->with(['success' => 'Компанії додано!']);
    }

}