<?php

namespace App\Http\Controllers;

use App\Mods;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller{

    public function index(Request $request, $id = null){
        if(!Auth::check()) return redirect('/login');
        if(!isset($id) && Auth::check()){
            $user = Auth::user();
        }else{
            $user = User::where('id', $id)->first();
        }
        return view('profile.profile', [
            'user' => $user,
            'mods' => Mods::where('user_id', $user->id)->get()
        ]);
    }

}
