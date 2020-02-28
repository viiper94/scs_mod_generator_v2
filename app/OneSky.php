<?php
/**
 * Created by PhpStorm.
 * User: viipe
 * Date: 28.09.2018
 * Time: 11:47
 */

namespace App;

use Onesky\Api\Client;

class OneSky{

    private $client;
    private $projectId = 307746;
    private $baseLanguage = 'en';
    private $format = 'HIERARCHICAL_JSON';

    public function __construct(){
        $this->client = new Client();
        $this->client->setApiKey(env('ONESKY_KEY'))->setSecret(env('ONESKY_SECRET'));
    }

    public function uploadFile(){
        // upload file
        $response = $this->client->files('upload', array(
            'project_id'  => $this->projectId,
            'file'        => resource_path('lang/json/en.json'),
            'file_format' => $this->format,
            'locale'      => $this->baseLanguage
        ));
        $response = json_decode($response, true);
        return $response['meta']['status'] === 201;
    }

    public function exportTranslations($locale){
        $replace = [
            'zh' => 'zh-Hans-CN',
            'pt' => 'pt-PT',
            'lt' => 'lt-LT',
            'lv' => 'lv-LV',
            'et' => 'et-EE',
        ];
        $in_locale = $locale;
        foreach($replace as $key => $val){
            if($locale == $key) $locale = $val;
        }

        // export translation
        $response = $this->client->translations('export', array(
            'project_id' => $this->projectId,
            'locale'     => $locale,
            'source_file_name' => $this->baseLanguage.'.json',
            'export_file_name' => $in_locale.'.json'
        ));
        if(!isset($response['meta'])){
//            dd();
            file_put_contents(resource_path('lang/json/'.$in_locale.'.json'),
                json_encode(json_decode($response, true), JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
            return true;
        }else{
            return false;
        }
    }

}
