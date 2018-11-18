<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Request;

class StaticMod extends Model{

    public $path = 'modifications';
    public $image_path = 'images/mods';
    protected $guarded = [];
    protected $casts = [
        'active' => 'boolean',
    ];
    public $ruLocales = ['ru', 'uk', 'be', 'kk', 'mo', 'ky', 'lv', 'lt', 'et', 'ka', 'az', 'hy', 'uz', 'tk'];

    public function isDLCContent(){
        return $this->dlc !== null;
    }

    public function getDLCs($onlyNames = false){
        $dlc_ids = explode(',', $this->dlc);
        $dlc = Dlc::where('active', 1)->find($dlc_ids);
        return $onlyNames ? $dlc = array_keys($dlc->keyBy('name')->toArray()) : $dlc;
    }

    public function saveFile($file_name){
        if(Request::hasFile('file')){
            $file = Request::file('file');
            if($this->file_name && file_exists(public_path($this->path).'/'.$this->file_name)){
                unlink(public_path($this->path) . '/' . $this->file_name);
            }
            $this->file_name = $file_name.'.'.$file->getClientOriginalExtension();
            return $file->move(public_path($this->path), $this->file_name);
        }
        return false;
    }

    public function saveImage(){
        if(Request::hasFile('img')){
            $file = Request::file('img');
            $img_name = $file->getClientOriginalName();
            if($file->getSize() <= 5500000){
                $img = new Image();
                $img->load($file->getPathName());
                if($img->getWidth() > 1920) $img->resizeToWidth(1920);
                $img->save(public_path($this->image_path).'/'.$img_name);
            }
            if($this->image && file_exists(public_path($this->image_path).'/'.$this->image)){
                unlink(public_path($this->image_path).'/'.$this->image);
            }
            return $img_name;
        }
        return null;
    }

    public function getTitle(){
        return in_array(App::getLocale(), $this->ruLocales) ? $this->title_ru : $this->title_en;
    }

    public function getDescription(){
        return in_array(App::getLocale(), $this->ruLocales) ? $this->description_ru : $this->description_en;
    }

}