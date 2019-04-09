<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller{

    public function index(){
        return view('admin.index');
    }

    public function users(Request $request){
        $users = User::select('*');
        if($request->input('q')) $users->where('name', 'like', '%'.$request->input('q').'%')
            ->orWhere('email', 'like', $request->input('q').'%');
        return view('admin.users', [
            'users' => $users->orderBy('created_at', 'desc')->paginate(20)
        ]);
    }

}