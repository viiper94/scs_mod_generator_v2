<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mods extends Model{

    protected $table = 'mods';

    public function canRegenerate(){
        return true;
    }

}
