<?php

namespace App;

use I18n;
use Illuminate\Database\Eloquent\Model;

class Chassis extends Model{

    public $weight;
    public $wheels;
    public $customWheels = false;

    protected $table = 'chassis';
    protected $casts = [
        'supports_wheels' => 'boolean',
        'coupled' => 'boolean',
        'with_accessory' => 'boolean',
        'with_paint_job' => 'boolean',
        'can_random' => 'boolean',
    ];

    public function dlc(){
        return $this->belongsTo('App\Dlc');
    }

    public function defaultWheels(){
        return $this->belongsTo('App\Wheel', 'wheels_id');
    }

    public function isDLCContent(){
        return $this->dlc_id !== null;
    }

    public function setWheels($wheels_def){
        if($this->supports_wheels){
            $wheel = Wheel::where(['def' => $wheels_def, 'active' => 1])->first();
            if($wheel){
                $this->wheels = $wheel;
                $this->customWheels = true;
                return true;
            }
        }
        $this->wheels = $this->defaultWheels;
        return false;
    }

    public function getAvailablePaints(){
        $to_replace = ['_1_4', '_1', '_4_3', '_4',
            'rm_double', 'rm53_double', 'pup_double', 'pup_triple',
            '_aero', '_double', '_bdouble', '_steer'];
        $list[] = [
            'name' => trans('general.all_companies'),
            'value' => 'all',
            'selected' => true
        ];
        $chassis = str_replace($to_replace, '', $this->alias);
        $paints = Paint::where(['game' => $this->game, 'chassis' => $chassis])->get();
        foreach($paints as $key => $paint){
            $name = trans($this->game.'_companies_paints.'.$paint->alias);
            if($paint->isDLCContent()){
                $name .= ' - '. trans('dlc_list.'.$paint->dlc->name);
            };
            $list[] = [
                'name' => $name,
                'value' => $paint->def
            ];
        }
        return $list;
    }

    public function getAvailableAccessories(){
        $list[] = [
            'name' => trans('general.choose_accessory'),
            'value' => '',
            'selected' => true
        ];
        $chassis = str_replace(['_default', '_black', '_yellow', '_red', '_blue', '_grey'], '', $this->alias);
        $accessories = Accessory::where(['game' => $this->game, 'chassis' => $chassis])->get();
        $dlc_list = Dlc::where('game', $this->game)->get()->keyBy('id');
        foreach($accessories as $key => $accessory){
            $name = trans($this->game.'_accessories.'.$accessory->alias);
            if($accessory->isDLCContent()){
                $name .= ' - ';
                $dlc = array();
                foreach(explode(',', $accessory->dlc) as $item){
                    $dlc[] = trans('dlc_list.'.$dlc_list[$item]->name);
                }
                $name .= implode(', ', $dlc);
            };
            $list[] = [
                'name' => $name,
                'value' => $accessory->def
            ];
        }
        return $list;
    }

    public static function getAllCompanies($lang, $game){
        $companies = Company::where('game', $game)->get();
        $list[] = [
            'name' => trans('general.choose_paint'),
            'value' => '',
            'selected' => true
        ];
        $list[] = [
            'name' => trans($game.'_companies_paints.default'),
            'value' => 'default'];
        foreach($companies as $company){
            $name = trans($game.'_companies_paints.'.$company->name);
            if($company->isDLCContent()){
                $name .= ' - '. trans('dlc_list.'.$company->dlc->name);
            };
            $list[] = [
                'name' => $name,
                'value' => $company->name
            ];
        }
        return $list;
    }
    
}