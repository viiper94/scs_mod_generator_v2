<?php

namespace App;

use Request;

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
        $this->rcopy($this->filesDir.'/'.$this->game.'/', $this->outDir.'/vehicle/truck');
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

}