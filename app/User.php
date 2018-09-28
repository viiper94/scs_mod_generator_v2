<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'steamid64', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        return $this->admin === 1;
    }

    public static function linkSteamAccount($info){
        $user = User::find(Auth::id());
        if(!$user->steamid64){
            $user->steamid64 = $info->steamID64;
            if(!$user->image){
                $file_name = time().'.jpg';
                $img = public_path().'/images/users/'.$file_name;
                file_put_contents($img, file_get_contents($info->avatarfull));
                $user->image = $file_name;
            }
            $user->save();
            return true;
        }
        return false;
    }

}