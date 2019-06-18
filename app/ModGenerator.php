<?php

namespace App;

use Request;
use ZipArchive;

class ModGenerator{

    public $title;
    public $chassis;
    public $paintJob;
    public $outDir = 'resources/out_';
    public $downloadDir = 'public/download';
    public $game;
    public $fileName;
    public $zip = true;

    protected function makeOutDirectory(){
        mkdir($this->outDir);
    }

    protected function removeOutDirectory(){
        !is_dir($this->outDir) ? : $this->rrmdir($this->outDir);
    }

    protected function copyCaravanFix(){
        $this->rcopy($this->filesDir.'/'.$this->game.'/trmp_fix', $this->outDir);
    }

    protected function rrmdir($src) {
        if(is_dir($src)){
            $dir = opendir($src);
            while(false !== ( $file = readdir($dir)) ) {
                if (( $file != '.' ) && ( $file != '..' )) {
                    $full = $src . '/' . $file;
                    if ( is_dir($full) ) {
                        $this->rrmdir($full);
                    }
                    else {
                        unlink($full);
                    }
                }
            }
            closedir($dir);
            rmdir($src);
        }
    }

    protected function rcopy($src, $dst){
        $dir = opendir($src);
        @mkdir($dst);
        while(( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    $this->rcopy($src .'/'. $file, $dst .'/'. $file);
                }
                else {
                    copy($src .'/'. $file,$dst .'/'. $file);
                }
            }
        }
        closedir($dir);
    }

    protected function rZipCopy(ZipArchive $zip, $src, $dst){
        $dir = opendir($src);
        @$zip->addEmptyDir($dst);
        while(( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    $this->rZipCopy($zip, $src .'/'. $file, $dst .'/'. $file);
                }
                else {
                    $zip->addFile($src .'/'. $file,$dst .'/'. $file);
                }
            }
        }
        closedir($dir);
    }

    protected function copyImage(){
        if(Request::hasFile('img')){
            $file = Request::file('img');
            if($file->getSize() <= 5500000){
                $img = new Image();
                $img->load($file->getPathName());
                $img->resize(276, 162);
                $img->save($this->outDir.'/mod_icon.jpg');
            }
        }else{
            if(file_exists($this->filesDir.'/mod/mod_icon.jpg')){
                copy($this->filesDir.'/mod/mod_icon.jpg', $this->outDir.'/mod_icon.jpg');
            }
        }
    }

    protected function zipFiles(){
        $zip = new ZipArchive();
        $filename = time().'_'.Transliterator::run($this->title);

        if($zip->open($this->downloadDir.'/'.$filename.'.scs', ZipArchive::CREATE) !== true){
            return false;
        }

        $content = file_get_contents($this->filesDir.'/mod/manifest_template.sii');
        $content = str_replace('%%', $this->title, $content);
        file_put_contents($this->filesDir.'/mod/manifest.sii', $content);

        $zip->addFile($this->filesDir.'/mod/manifest.sii', 'manifest.sii');
        $zip->addEmptyDir('def');
        $this->rZipCopy($zip, $this->outDir, 'def');
        if(is_dir($this->filesDir.'/mod/material')){
            $zip->addEmptyDir('material');
            $this->rZipCopy($zip, $this->filesDir.'/mod/material', 'material');
        }

        $this->copyImage();
        $zip->addFile($this->outDir.'/mod_icon.jpg', 'mod_icon.jpg');

        $zip->close();

        return $filename;
    }

}