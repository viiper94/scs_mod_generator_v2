<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paint extends Model{

    public function dlc(){
        return $this->belongsTo('App\Dlc');
    }

    public function isDLCContent(){
        return $this->dlc_id !== null;
    }

}