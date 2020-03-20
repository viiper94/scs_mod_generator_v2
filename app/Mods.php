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
        if($this->type == 'paint') return false;
        try{
            if($params['form']['chassis'] !== 'paintable'){
                Chassis::where(['alias' => $params['form']['chassis'], 'active' => '1'])->firstOrFail();
            }
            if(key_exists('accessory', $params['form'])) Accessory::where(['def' => $params['form']['accessory'], 'active' => '1'])->firstOrFail();
            if(key_exists('paint', $params['form']))
                Paint::where('active', '1')
                ->where('def', $params['form']['paint'])
                ->orWhere('look', $params['form']['paint'])
                ->firstOrFail();
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
        $last_week = Carbon::now()->subDay(7)->toDateString();
        $mods = Mods::where('created_at', '<', $last_week.' 00:00:00')->get();
        foreach($mods as $mod){
            if($mod->file_name && file_exists(public_path('download/'.$mod->file_name.'.scs'))){
                unlink(public_path('download/'.$mod->file_name.'.scs'));
            }
        }
        $last_month = Carbon::now()->subDay(31)->toDateString();
        Mods::where('created_at', '<', $last_month.' 00:00:00')->whereNull('user_id')->delete();
    }

}
