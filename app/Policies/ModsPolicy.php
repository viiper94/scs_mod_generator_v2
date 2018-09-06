<?php

namespace App\Policies;

use App\User;
use App\Mods;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModsPolicy{
    use HandlesAuthorization;

    public function before($user, $ability){
        if($user->isAdmin()){
            return true;
        }
        return null;
    }

    public function mark(User $user, Mods $mods){
        return $user->id === $mods->user_id;
    }

    public function delete(User $user, Mods $mods){
        return $user->id === $mods->user_id;
    }

}
