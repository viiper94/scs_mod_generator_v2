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
        $filename = time().'_'.$this->transliterate($this->title);

        if($zip->open($this->downloadDir.'/'.$filename.'.scs', ZipArchive::CREATE) !== true){
            return false;
        }

        $content = file_get_contents($this->filesDir.'/mod/manifest_template.sii');
        $content = str_replace('%%', $this->title, $content);
        file_put_contents($this->filesDir.'/mod/manifest.sii', $content);

        $zip->addFile($this->filesDir.'/mod/manifest.sii', 'manifest.sii');
        $zip->addEmptyDir('def');
        $this->rZipCopy($zip, $this->outDir, 'def');

        $this->copyImage();
        $zip->addFile($this->outDir.'/mod_icon.jpg', 'mod_icon.jpg');

        $zip->close();

        return $filename;
    }

    protected function transliterate($str){
        $ru = ['а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '',  'ы' => 'y',   'ъ' => '',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
            'ü' => 'u',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
            'Ü' => 'u',

            ' ' => '_', '&' => '', '/' => '_',
            '\'' => '', ',' => ''];

        return strtr($str, $ru);
    }

}