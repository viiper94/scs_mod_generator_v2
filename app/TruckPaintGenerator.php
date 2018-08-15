<?php

namespace App;

use Request;
use ZipArchive;

class TruckPaintGenerator extends ModGenerator{

    public $filesDir = 'resources/files/trucks';

    public function load($chassis, $paintJob, $out_dir){
        $this->title = strlen(Request::input('title')) == 0 ? 'Paint Mod' : trim(Request::input('title'));
        $this->chassis = $chassis;
        $this->paintJob = $paintJob;
        $this->game = Request::input('target');

        $this->outDir = $out_dir;
        $this->filesDir = $_SERVER['DOCUMENT_ROOT'] .'/../'. $this->filesDir;
        $this->downloadDir = $_SERVER['DOCUMENT_ROOT'] .'/../'. $this->downloadDir;
    }

    public function run(){
        $this->copyTrucksFiles();
        $this->replaceTrucksFiles();
        $this->fileName = $this->zipFiles();
        $this->removeOutDirectory();
        return true;
    }

    private function copyTrucksFiles(){
        mkdir($this->outDir.'/vehicle/truck');
        $dir = $this->filesDir.'/'.$this->game.'/';
        if($trucks = scandir($dir)){
            foreach($trucks as $truck){
                if($truck != '.' && $truck != '..'){
                    mkdir($this->outDir.'/vehicle/truck/'.$truck);
                    mkdir($this->outDir.'/vehicle/truck/'.$truck.'/paint_job');
                    $new_dir = $this->filesDir.'/'.$this->game.'/'.$truck.'/paint_job';
                    if($new_dir_files = scandir($new_dir)){
                        foreach($new_dir_files as $file){
                            if(is_file($new_dir .'/'. $file)){
                                copy($new_dir .'/'. $file, $this->outDir.'/vehicle/truck/'.$truck.'/paint_job/'.$file);
                            }
                        }
                    }
                }
            }
        }
    }

    private function replaceTrucksFiles(){
        $dirname = $this->outDir.'/vehicle/truck';
        foreach(scandir($dirname) as $truck){
            if($truck !== '.' && $truck !== '..'){
                foreach(scandir($dirname.'/'.$truck.'/paint_job') as $file){
                    if($file !== '.' && $file !== '..'){
                        $content = file_get_contents($dirname.'/'.$truck.'/paint_job/'.$file);
                        $content = str_replace('%name%', $this->title, $content);
                        $content = str_replace('%color%', $this->paintJob->color, $content);
                        file_put_contents($dirname.'/'.$truck.'/paint_job/'.$file, $content);
                    }
                }
            }
        }
    }

    private function zipFiles(){
        $zip = new ZipArchive();
        $filename = time().'_'.$this->transliterate($this->title);

        if($zip->open($this->downloadDir.'/'.$filename.'.scs', ZipArchive::CREATE) !== true){
            return false;
        }

        $content = file_get_contents($this->filesDir.'/mod/manifest_template.sii');
        $content = str_replace('%%', $this->title, $content);
        file_put_contents($this->filesDir.'/mod/manifest.sii', $content);

        $zip->addFile($this->filesDir.'/mod/manifest.sii', 'manifest.sii');
        $zip->addFile($this->outDir.'/mod_icon.jpg', 'mod_icon.jpg');

        if(is_dir($this->outDir.'/vehicle/truck')){
            $zip->addEmptyDir('def/vehicle/truck');
            $dir = scandir($this->outDir . '/vehicle/truck');
            foreach($dir as $truck){
                if($truck != '.' && $truck != '..'){
                    $zip->addEmptyDir('def/vehicle/truck/'.$truck);
                    $zip->addEmptyDir('def/vehicle/truck/'.$truck.'/paint_job');
                    $in_dir = scandir($this->outDir.'/vehicle/truck/'.$truck.'/paint_job');
                    foreach($in_dir as $paint){
                        if($paint != '.' && $paint != '..'){
                            $zip->addFile($this->outDir.'/vehicle/truck/'.$truck.'/paint_job/'.$paint,
                                'def/vehicle/truck/'.$truck.'/paint_job/'.$paint);
                        }
                    }
                }
            }
        }

        if(is_dir($this->outDir.'/vehicle/trailer')){
            $zip->addEmptyDir('def/vehicle/trailer');
            $dir = scandir($this->outDir . '/vehicle/trailer');
            foreach($dir as $item){
                if($item != '.' && $item != '..'){
                    $zip->addFile($this->outDir . '/vehicle/trailer/' . $item, 'def/vehicle/trailer/' . $item);
                }
            }
        }

        if(is_dir($this->outDir.'/company')){
            $zip->addEmptyDir('def/company');
            $dir = scandir($this->outDir.'/company');
            foreach($dir as $item){
                if($item != '.' && $item != '..'){
                    $zip->addFile($this->outDir.'/company/'.$item, 'def/company/'.$item);
                }
            }
        };

        if(is_dir($this->outDir.'/cargo')){
            $zip->addEmptyDir('def/cargo');
            $dir = scandir($this->outDir.'/cargo');
            foreach($dir as $inner_dir){
                if($inner_dir != '.' && $inner_dir != '..'){
                    $zip->addEmptyDir('def/cargo/'.$inner_dir);
                    foreach(scandir($this->outDir.'/cargo/'.$inner_dir) as $file){
                        if($file != '.' && $file != '..'){
                            $zip->addFile($this->outDir.'/cargo/'.$inner_dir.'/'.$file, 'def/cargo/'.$inner_dir.'/'.$file);
                        }
                    }

                }
            }
        };

        $zip->close();

        return $filename;
    }

}