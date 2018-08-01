<?php

namespace App;

use I18n;
use Illuminate\Database\Eloquent\Model;

class Chassis extends Model{

    public $common_name;
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

    public function wheels(){
        return $this->belongsTo('App\Wheel');
    }

    public function isDLCContent(){
        return $this->dlc_id !== null;
    }

    public function getAvailablePaints($lang){
        $list[] = [
            'name' => I18n::t('all_companies'),
            'value' => 'all',
            'selected' => true
        ];
        $chassis = str_replace(['_1_4', '_1', '_4_3', '_4', 'rm_double', 'rm53_double', 'pup_double', 'pup_triple'], '', $this->alias);
        $paints = Paint::where(['game' => $this->game, 'chassis' => $chassis])->get();
        foreach($paints as $key => $paint){
            $name = I18n::t($paint->look, $lang);
            if($paint->isDLCContent()){
                $name .= ' - '. I18n::t($paint->dlc->name, $lang);
            };
            $list[] = [
                'name' => $name,
                'value' => $paint->def
            ];
        }
        return $list;
    }

    public function getAvailableAccessories($lang){
        $list[] = [
            'name' => I18n::t('choose_accessory'),
            'value' => '',
            'selected' => true
        ];
        $chassis = str_replace(['_default', '_black', '_yellow', '_red', '_blue', '_grey'], '', $this->alias);
        $accessories = Accessory::where(['game' => $this->game, 'chassis' => $chassis])->get();
        $dlc_list = Dlc::where('game', $this->game)->get()->keyBy('id');
        foreach($accessories as $key => $accessory){
            $name = I18n::t($accessory->alias, $lang);
            if($accessory->isDLCContent()){
                $name .= ' - ';
                $dlc = array();
                foreach(explode(',', $accessory->dlc) as $item){
                    $dlc[] = I18n::t($dlc_list[$item]->name, $lang);
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
            'name' => I18n::t('choose_paint'),
            'value' => '',
            'selected' => true
        ];
        $list[] = [
            'name' => I18n::t('default', $lang),
            'value' => 'default'];
        foreach($companies as $company){
            $name = I18n::t($company->name, $lang);
            if($company->isDLCContent()){
                $name .= ' - '. I18n::t($company->dlc->name);
            };
            $list[] = [
                'name' => $name,
                'value' => $company->name
            ];
        }
        return $list;
    }
    
}