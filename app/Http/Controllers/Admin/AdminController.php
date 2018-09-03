<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller{

    public function index(){
        return view('admin.index');
    }

    public function users(){
        return view('admin.users', [
            'users' => User::all()
        ]);
    }

}