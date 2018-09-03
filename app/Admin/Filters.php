<?php

namespace App\Admin;

class Filters{

    protected $defaultFields = [
        'active',
        'id',
        'created_at',
        'updated_at',
    ];

    public static function applySort($request, $instance, $fields = []){

    }

}