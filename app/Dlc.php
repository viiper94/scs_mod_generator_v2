<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dlc extends Model{

    protected $table = 'dlc';
    protected $guarded = [];
    protected $casts = [
        'mp_support' => 'boolean',
        'active' => 'boolean',
    ];

    public static $types = [
        'map', 'trailer', 'addon', 'other'
    ];

}
