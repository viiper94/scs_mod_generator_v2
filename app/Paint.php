<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paint extends Model{

    public $allCompanies = false;
    public $color = '1, 1, 1';
    protected $guarded = [];
    protected $casts = [
        'with_color' => 'boolean',
        'active' => 'boolean',
    ];
    public static $defaultOwnablePaintJob = [
        'ets2' => '/def/vehicle/trailer_owned/scs.box/paint_job/color_custom.sii',
        'ats' => '/def/vehicle/trailer_owned/scs.box/paint_job/color0.sii',
    ];

    public function chassisObj(){
        return $this->belongsTo('App\Chassis', 'chassis', 'alias_short_paint');
    }

    public function dlc(){
        return $this->belongsTo('App\Dlc');
    }

    public function isDLCContent(){
        return $this->dlc_id !== null;
    }

    public function setPaintColor($color){
        if($this->with_color){
            if(is_array($color)){
                $colors['r'] = $color['scs']['r'] ?? '1';
                $colors['g'] = $color['scs']['g'] ?? '1';
                $colors['b'] = $color['scs']['b'] ?? '1';
                $this->color = $colors['r'].', '.$colors['g'].', '.$colors['b'];
                return true;
            }else{
                $this->color = $color;
                return false;
            }
        }else{
            $this->color = '1, 1, 1';
            return false;
        }
    }

    public static function getAllPaintsDefs($game){
        $paints = Paint::where(['game' => $game, 'active' => 1])->orderBy('chassis', 'asc')->get();
        $list = array();
        foreach($paints as $item){
            $list[] = [
                'name' => '<span data-with-color="'.$item->with_color.'">'.$item->def.'</span>',
                'value' => $item->def
            ];
        }
        $list[0]['selected'] = true;
        return $list;
    }

}
