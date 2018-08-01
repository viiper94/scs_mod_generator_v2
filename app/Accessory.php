<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model{

    protected $table = 'accessories';

    public function isDLCContent(){
        return $this->dlc !== null;
    }

}