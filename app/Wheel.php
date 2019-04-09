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

    public function getWheelName(){
        $name = trans($this->game.'_wheels.'.$this->alias);
        if(!$this->mp_support) $name .= '<span class="hint left">'.trans('general.mp_no_support').'</span>';
        if($this->isDLCContent()) $name .= '<span class="hint right">'.trans('dlc_list.'.$this->dlc->name).'</span>';
        return $name;
    }

}
