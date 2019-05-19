<?php

namespace App;

use I18n;
use Illuminate\Database\Eloquent\Model;

class Chassis extends Model{

    public $weight;
    public $wheels;
    public $customWheels = false;
    public static $defaultOwnableDef = [
        'ets2' => 'trailer_def.scs.box.single_3.curtain',
        'ats' => 'trailer_def.scs.box.single_45r.insulated',
    ];

    protected $table = 'chassis';
    protected $guarded = [];
    protected $casts = [
        'supports_wheels' => 'boolean',
        'coupled' => 'boolean',
        'with_accessory' => 'boolean',
        'with_paint_job' => 'boolean',
        'trailer_owned' => 'boolean',
        'can_random' => 'boolean',
        'mp_support' => 'boolean',
        'active' => 'boolean',
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
        $paints = Paint::with('dlc')->where(['game' => $this->game, 'chassis' => $this->alias_short_paint, 'active' => 1])
            ->orderBy('sort', 'desc')->orderBy('alias', 'asc')->get();
        if(count($paints) > 1){
            $list[] = [
                'name' => trans('general.all_companies'),
                'value' => 'all',
                'selected' => true
            ];
        }
        foreach($paints as $key => $paint){
            $name = '';
            if($paint->isDLCContent() && !$paint->dlc->mp_support){
                $name .= '<s class="left hint dlc-tooltipped" 
                    data-tooltip="'.trans('general.mp_no_support').'" 
                    data-position="left">MP</s>';
            }
            $name .= '<span data-with-color="'.$paint->with_color.'">'.trans($this->game.'_companies_paints.'.$paint->alias).'</span>';
            if($paint->isDLCContent()){
                $name .= '<span class="right dlc-tooltipped hint" 
                    data-tooltip="'.trans('dlc_list.'.$paint->dlc->name).'" 
                    data-position="right">';
                $name .= '['.$paint->dlc->short_name.']';
                $name .= '</span>';
            };
            $list[] = [
                'name' => $name,
                'value' => $paint->def,
                'selected' => count($paints) == 1
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
        $accessories = Accessory::where(['game' => $this->game, 'active' => 1])
            ->whereIn('chassis', [$this->alias_short_paint, $this->accessory_subgroup])
            ->orderBy('alias', 'asc')->get();
        $dlc_list = Dlc::where('game', $this->game)->get()->keyBy('id');
        foreach($accessories as $key => $accessory){
            $name = '';
            if($accessory->isDLCContent()){
                foreach(explode(',', $accessory->dlc) as $item){
                    if(!$dlc_list[$item]->mp_support) $name .= '<s class="left hint dlc-tooltipped" 
                        data-tooltip="'.trans('general.mp_no_support').'" 
                        data-position="left">MP</s>';
                    break;
                }
            }
            $name .= trans($this->game.'_accessories.'.$accessory->alias);
            if($accessory->isDLCContent()){
                $dlc = array();
                $dlc_short = array();
                foreach(explode(',', $accessory->dlc) as $item){
                    $dlc[] = trans('dlc_list.'.$dlc_list[$item]->name);
                    $dlc_short[] = '['.$dlc_list[$item]->short_name.']';
                }
                $name .= '<span class="right dlc-tooltipped hint" 
                    data-tooltip="'.implode(', ', $dlc).'" 
                    data-position="right">';
                $name .= implode(' ', $dlc_short);
                $name .= '</span>';
            };
            $list[] = [
                'name' => $name,
                'value' => $accessory->def
            ];
        }
        return $list;
    }

    public static function getAllCompanies($game){
        $companies = Company::where('game', $game)->orderBy('name', 'asc')->get();
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