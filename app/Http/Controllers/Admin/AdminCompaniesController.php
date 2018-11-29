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

    }

}
