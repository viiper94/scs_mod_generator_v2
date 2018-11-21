<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Mods extends Model{

    protected $table = 'mods';
    protected $casts = [
        'broken' => 'boolean',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function canRegenerate(){
        $params = unserialize($this->params);
        try{
            if($params['form']['chassis'] !== 'paintable'){
                Chassis::where(['alias' => $params['form']['chassis'], 'active' => '1'])->firstOrFail();
                $paint = 'def';
            }else{
                $paint = 'look';
            }
            if(key_exists('accessory', $params['form'])) Accessory::where(['def' => $params['form']['accessory'], 'active' => '1'])->firstOrFail();
            if(key_exists('paint', $params['form'])) Paint::where([$paint => $params['form']['paint'], 'active' => '1'])->firstOrFail();
        }catch(ModelNotFoundException $e){
            return false;
        }
        return true;
    }

    public function markMod(){
        $this->broken = !$this->broken;
        return $this->save();
    }

    public static function cleanUp(){
        $fromDate = Carbon::now()->subDay(7)->toDateString();
        $mods = Mods::where('created_at', '<', $fromDate.' 00:00:00')->get();
        foreach($mods as $mod){
            if($mod->file_name && file_exists(public_path('download/'.$mod->file_name.'.scs'))){
                unlink(public_path('download/'.$mod->file_name.'.scs'));
            }
        }
    }

}