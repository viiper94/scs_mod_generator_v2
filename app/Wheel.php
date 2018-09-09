<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wheel extends Model{

    protected $guarded = [];
    protected $casts = [
        'mp_support' => 'boolean',
        'active' => 'boolean',
    ];

}
