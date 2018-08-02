<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paint extends Model{

    public $allCompanies = false;
    public $color = '1, 1, 1';

    public function dlc(){
        return $this->belongsTo('App\Dlc');
    }

    public function isDLCContent(){
        return $this->dlc_id !== null;
    }

    public function setPaintColor($color){
        if($this->look == 'default'){
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
        $paints = Paint::where('game', $game)->get();
        $list = array();
        foreach($paints as $item){
            $list[] = [
                'name' => $item->def,
                'value' => $item->def
            ];
        }
        $list[0]['selected'] = true;
        return $list;
    }

}