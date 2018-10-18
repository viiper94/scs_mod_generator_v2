<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mods extends Model{

    protected $table = 'mods';
    protected $casts = [
        'broken' => 'boolean',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function canRegenerate(){
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