<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wheel extends Model{

    protected $guarded = [];
    protected $casts = [
        'mp_support' => 'boolean',
        'active' => 'boolean',
    ];

    public static $defaultOwnableWheels = [
        'ets2' => [
            'r' => [
                'tire' => '/def/vehicle/trailer_wheel/r_tire/385_55_r22_t.sii',
                'disk' => '/def/vehicle/trailer_wheel/r_disc/disc_0_01_matt_gray.sii',
                'hub' => '/def/vehicle/trailer_wheel/r_hub/hub_0_01.sii',
                'nuts' => '/def/vehicle/trailer_wheel/r_nuts/nuts_steel_0_01.sii',
            ],
            'f' => [
                'tire' => '/def/vehicle/trailer_wheel/f_tire/245_70_r17_t.sii',
                'disk' => '/def/vehicle/trailer_wheel/f_disc/disc_0_01_matt_gray.sii',
                'hub' => '/def/vehicle/trailer_wheel/f_hub/hub_0_01.sii',
                'nuts' => '/def/vehicle/trailer_wheel/f_nuts/nuts_steel_0_01.sii',
            ],
            'c' => [],
        ],
        'ats' => [
            'r' => [
                'tire' => '/def/vehicle/trailer_wheel/r_tire/1.sii',
                'disk' => '/def/vehicle/trailer_wheel/r_disc/rear_disc_steel.sii',
                'hub' => '/def/vehicle/trailer_wheel/r_hub/rear_hub_01.sii',
                'nuts' => '/def/vehicle/trailer_wheel/r_nuts/rear_nuts_01_steel.sii',
            ],
            'f' => [],
            'c' => [],
        ],
    ];
    public static $rules = [
        0 => [
            'chemical_long' => [
                'def' => '/def/vehicle/t_wheel/front.sii',
            ],
            'acid_long' => [
                'def' => '/def/vehicle/t_wheel/front.sii',
            ],
            'flatbed53_4ax' => [
                'def' => '/def/vehicle/t_wheel/front.sii',
            ],
        ],
        1 => [],
        2 => [],
        3 => [],
        4 => [],
        5 => [],
        6 => [],
        7 => [],
        8 => [],
        9 => [],
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

    public static function getWheelState($axle, $chassis){
        /** Some boolean algebra magic here
         *
         * A - $hasRule
         * R - $isRequired
         * C - $isCustom
         * S - supportWheels
         *  _____________________
         * | A | R | C | S | out |
         * |---------------------|
         * | 0 | 0 | 0 | 0 |  1  |
         * | 0 | 0 | 0 | 1 |  2  |
         * | 0 | 0 | 1 | 0 |  *  |
         * | 0 | 0 | 1 | 1 |  1  |
         * | 0 | 1 | 0 | 0 |  *  |
         * | 0 | 1 | 0 | 1 |  *  |
         * | 0 | 1 | 1 | 0 |  *  |
         * | 0 | 1 | 1 | 1 |  *  |
         * | 1 | 0 | 0 | 0 |  3  |
         * | 1 | 0 | 0 | 1 |  2  |
         * | 1 | 0 | 1 | 0 |  *  |
         * | 1 | 0 | 1 | 1 |  1  |
         * | 1 | 1 | 0 | 0 |  3  |
         * | 1 | 1 | 0 | 1 |  3  |
         * | 1 | 1 | 1 | 0 |  *  |
         * | 1 | 1 | 1 | 1 |  3  |
         * ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
         *
         *        R      !R
         *    |¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯|
         *    | 3 | 3 | 2 | 3 | !C
         *  A |−−−−−−−−−−−−−|
         *    | * | 3 | 1 | * |
         *    |−−−−−−−−−−−−−|  C
         *    | * | * | 1 | * |
         * !A |−−−−−−−−−−−−−| !C
         *    | * | * | 2 | 1 |
         *    ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
         *     !S     S    !S
         *
         * 1 = !RCS || !A!R!S
         * 2 = !R!CS
         * 3 = R || A!S
         */
        $rules = self::$rules;

        $hasRule = key_exists($chassis->alias, $rules[$axle]);
        $isRequired = $hasRule && isset($rules[$axle][$chassis->alias]['required']) && $rules[$axle][$chassis->alias]['required'];
        $isCustom = $chassis->customWheels;
        $supportWheels = $chassis->supports_wheels;

        if((!$isRequired && $isCustom && $supportWheels) || (!$hasRule && !$isRequired && !$supportWheels)) return 1;
        if(!$isRequired && !$isCustom && $supportWheels) return 2;
        if($isRequired || ($hasRule && !$supportWheels)) return 3;

        return false;
    }

}
