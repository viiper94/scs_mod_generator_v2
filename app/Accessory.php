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
        $suffixes = explode(',', $this->suffixes);
        $default_suffix = null;
        $replace = null;
        $suffix_list = array();
        foreach($suffixes as $key => $suf){
            if(stripos($suf, '%') !== false) $default_suffix = $key;
            $suffix_list[$key] = str_replace('%', '', $suf);
        }
        foreach($suffix as $key => $s){
            if(in_array($s, $suffix_list)) $replace = $s;
        }
        if($replace){
            return str_replace($suffix_list, $replace, $this->def);
        }elseif(empty($suffix)){
            $replace = isset($default_suffix) ? '_'.$suffix_list[$default_suffix] : '';
            array_walk($suffix_list, function(&$item1){
                $item1 = "_$item1";
            });
            return str_replace($suffix_list, $replace, $this->def);
        }else{
            return $this->def;
        }
    }

    public static function getCargoParams($temp){
        $is_slave = false;
        $params = explode('_', str_replace('%', '', $temp));
        if(in_array('s', $params)){
            $is_slave = true;
            array_splice($params, array_search('s', $params, true), 1);
        }
        $suffix = isset($params[1]) ? explode(',', $params[1]) : array();
        return ['suffix' => $suffix, 'slave' => $is_slave];
    }

}