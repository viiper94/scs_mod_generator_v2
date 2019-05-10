<?php

namespace App;

use I18n;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model{

    protected $table = 'accessories';
    protected $guarded = [];
    protected $casts = [
        'active' => 'boolean',
    ];

    public function chassisObj(){
        return $this->belongsTo('App\Chassis', 'chassis', 'alias_short_paint');
    }

    public function isDLCContent(){
        return $this->dlc !== null;
    }

    public function getDLCs($onlyNames = false){
        $dlc_ids = explode(',', $this->dlc);
        $dlc = Dlc::where('active', 1)->find($dlc_ids);
        return $onlyNames ? $dlc = array_keys($dlc->keyBy('name')->toArray()) : $dlc;
    }

    public static function getAllAccessoriesDefs($game){
        $accessories = Accessory::where(['game' => $game, 'active' => 1])->orderBy('chassis', 'asc')->get();
        $list[] = [
            'name' => trans('general.choose_accessory'),
            'value' => '',
            'selected' => true
        ];
        foreach($accessories as $item){
            $list[] = [
                'name' => $item->def,
                'value' => $item->def
            ];
        }
        return $list;
    }

    public function getDefBySuffix($suffix){
        $suffix_list = explode(',', $this->suffixes);
        if(in_array($suffix, $suffix_list)){
            array_walk($suffix_list, function(&$item, $key, $prefix = '_'){
                $item = $prefix.$item;
            });
            $new_def = str_replace($suffix_list, '', $this->def);
            return str_replace('.sii', '_'.$suffix.'.sii', $new_def);
        }else{
            return $this->def;
        }
    }

    public static function getCargoParams($temp){
        $params = explode('_', str_replace('%', '', $temp));
        $suffix = $params[1] ?? null;
        $is_slave = isset($params[2]) && $params[2] == 's';
        return ['suffix' => $suffix, 'slave' => $is_slave];
    }

}