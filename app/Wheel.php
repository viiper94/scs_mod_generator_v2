<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wheel extends Model{

    protected $guarded = [];
    protected $casts = [
        'mp_support' => 'boolean',
        'active' => 'boolean',
    ];

    public function dlc(){
        return $this->belongsTo('App\Dlc');
    }

    public function isDLCContent(){
        return $this->dlc_id !== null;
    }

}
