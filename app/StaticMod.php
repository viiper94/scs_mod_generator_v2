<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;

class StaticMod extends Model{

    public $path = 'modifications';
    public $image_path = 'images/mods';
    protected $guarded = [];
    protected $casts = [
        'active' => 'boolean',
    ];

    public function getDLCs($onlyNames = false){
        $dlc_ids = explode(',', $this->dlc);
        $dlc = Dlc::where('active', 1)->find($dlc_ids);
        return $onlyNames ? $dlc = array_keys($dlc->keyBy('name')->toArray()) : $dlc;
    }

    public function saveFile($file_name){
        if(Request::hasFile('file')){
            $file = Request::file('file');
            $this->file_name = $file_name.'.'.$file->getClientOriginalExtension();
            return $file->move(public_path($this->path), $this->file_name);
        }
        return false;
    }

    public function saveImage(){
        if(Request::hasFile('img')){
            $file = Request::file('img');
            $img_name = $file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            if($file->getSize() <= 5500000){
                $img = new Image();
                $img->load($file->getPathName());
                if($img->getWidth() > 1920) $img->resizeToWidth(1920);
                $img->save(public_path($this->image_path).'/'.$img_name);
            }
            return $img_name;
        }
        return null;
    }

}