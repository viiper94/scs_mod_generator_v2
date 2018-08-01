<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model{

    protected $table = 'accessories';

    public function isDLCContent(){
        return $this->dlc !== null;
    }

    public function getDLCs($onlyNames = false){
        $dlc_ids = explode(',', $this->dlc);
        $dlc = Dlc::where('active', 1)->find($dlc_ids);
        return $onlyNames ? $dlc = array_keys($dlc->keyBy('name')->toArray()) : $dlc;
    }

}