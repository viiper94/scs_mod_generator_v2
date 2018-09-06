<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mods extends Model{

    protected $table = 'mods';
    protected $casts = [
        'broken' => 'boolean',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function canRegenerate(){
        return true;
    }

    public function markMod(){
        $this->broken = !$this->broken;
        return $this->save();
    }

}