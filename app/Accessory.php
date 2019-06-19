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
        $suffixes = $this->suffixes ? explode(',', $this->suffixes) : null;
        $default_suffix = null;
        $with_underscore = array();
        $replace = null;
        $suffix_list = array();
        if($suffixes){
            foreach($suffixes as $key => $suf){
                if(stripos($suf, '%') !== false) $default_suffix = $key;
                $with_underscore[$key] = stripos($suf, '^') === false;
                $suffix_list[$key] = str_replace(['%', '^'], '', $suf);
            }
            foreach($suffix as $key => $s){
                if(!$s || $s === '') unset($suffix[$key]);
                else if(in_array($s, $suffix_list)) $replace = $s;
            }
            if($replace){
                return str_replace($suffix_list, $replace, $this->def);
            }elseif(empty($suffix)){
                $replace = isset($default_suffix) ? '_'.$suffix_list[$default_suffix] : '';
                foreach($suffix_list as $key => $s){
                    if($with_underscore[$key]) $suffix_list[$key] = "_$s";
                }
                return str_replace($suffix_list, $replace, $this->def);
            }
        }
        return $this->def;
    }

}