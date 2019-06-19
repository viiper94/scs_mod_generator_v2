<?php

namespace App;

use function foo\func;
use Request;
use Illuminate\Support\Facades\DB;

class TrailerGenerator extends ModGenerator{

	public $accessory;
	public $filesDir = 'resources/files/trailers';
	public $dlc = ['base'];

	public function load($chassis, $accessory, $paintJob){
        $this->game = Request::input('target');
		$this->chassis = $chassis;
		$this->accessory = $accessory;
		$this->paintJob = $paintJob;
		$this->dlc = $this->getDLCArray();
        $this->title = $this->getTitle();
		
		$this->outDir = $_SERVER['DOCUMENT_ROOT'] .'/../'. $this->outDir . time();
		$this->filesDir = $_SERVER['DOCUMENT_ROOT'] .'/../'. $this->filesDir;
		$this->downloadDir = $_SERVER['DOCUMENT_ROOT'] .'/../'. $this->downloadDir;
	}

	public function run(){
		$this->makeOutDirectory();
        $this->copyTrailerFiles();
        $this->replaceTrailerFiles();
		if($this->paintJob && !$this->paintJob->allCompanies){
			$this->copyCompanyFiles();
			$this->replaceCompanyFiles();
		}
		if($this->chassis->alias !== 'paintable' && Request::input('paint') !== 'all'){
            $this->copyDealerFiles();
            $this->copyTrailerDefsFiles();
            $this->replaceDealerFile();
        }
        if(Request::input('fix') == 'on'){
            $this->copyCaravanFix();
        }
		if($this->zip){
            $this->fileName = $this->zipFiles();
            $this->removeOutDirectory();
        }else{
		    return $this->outDir;
        }
        return true;
	}

    private function getTitle(){
        $title = trim(htmlentities(Request::post('title')));
        if(strlen($title) == 0){
            $title = trans($this->game.'_trailers.'.$this->chassis->alias);
        }
        return $title;
	}

	private function getDLCArray(){
		$array = $this->dlc;
        if($this->chassis && $this->chassis->dlc) array_push($array, $this->chassis->dlc->name);
		if($this->accessory && $this->accessory->dlc) $array = array_merge($array, $this->accessory->getDLCs(true));
		if($this->paintJob && $this->paintJob->dlc) array_push($array, $this->paintJob->dlc->name);
		if(Request::input('dlc') && is_array(Request::input('dlc'))){
		    foreach(Request::input('dlc') as $key => $value){
		        array_push($array, $key);
            }
        }
        return array_filter(array_unique($array), function($dlc){
            return is_dir(base_path($this->filesDir.'/'.$this->game.'/'.$dlc));
        });
	}

	private function copyTrailerFiles(){
		mkdir($this->outDir.'/vehicle');
		mkdir($this->outDir.'/vehicle/trailer');
		foreach($this->dlc as $dlc){
			$this->rcopy($this->filesDir.'/'.$this->game.'/'.$dlc.'/trailers', $this->outDir.'/vehicle/trailer');
		}
	}

    private function copyDealerFiles(){
        if(is_dir($this->filesDir.'/'.$this->game.'/dealer')) {
            $this->rcopy($this->filesDir . '/' . $this->game . '/dealer', $this->outDir . '/vehicle');
        }
    }

	private function copyCompanyFiles(){
		mkdir($this->outDir.'/company');
		foreach($this->dlc as $dlc){
            if(is_dir($this->filesDir.'/'.$this->game.'/'.$dlc.'/companies')) {
                $this->rcopy($this->filesDir . '/' . $this->game . '/' . $dlc . '/companies', $this->outDir . '/company');
            }
		}
	}

    private function copyTrailerDefsFiles(){
        @mkdir($this->outDir.'/vehicle/trailer_defs');
        foreach($this->dlc as $dlc){
            if(is_dir($this->filesDir.'/'.$this->game.'/'.$dlc.'/trailer_defs')){
                $this->rcopy($this->filesDir.'/'.$this->game.'/'.$dlc.'/trailer_defs', $this->outDir.'/vehicle/trailer_defs');
            }
        }
	}

	private function replaceTrailerFiles(){
		$dirname = $this->outDir.'/vehicle/trailer';
		if(!is_dir($dirname)) mkdir($dirname);
		$dir = opendir($dirname);
		while (($file = readdir($dir)) !== false){
			if($file != "." && $file != ".."){
				if(is_file($dirname."/".$file)){
					$rows = file($dirname."/".$file, FILE_IGNORE_NEW_LINES);
					$trailer_name = trim(preg_split('/trailer\./', $rows[0])[1]);
					if($this->chassis->alias == 'paintable'){
						$content = $this->generatePaintableTrailersContent($rows);
						if(stripos($content,'base_color') === false){
							$content = $this->generateRandomTrailerContent($trailer_name);
                        }
                    }else{
                        $content = $this->generateMarketTrailerContent($trailer_name);
					}
                    file_put_contents($dirname."/".$file, $content);
				}
			}
		}
		closedir($dir);
	}

    private function replaceDealerFile(){
        $file = $this->outDir .'/vehicle/trailer_dealer/tmg/tmg_trailer.sii';
        file_put_contents($file, $this->generateDealerTrailerContent());
        $dirname = $this->outDir .'/vehicle/tmg';
        $dir = opendir($dirname);
        while (($file = readdir($dir)) !== false){
            if($file != "." && $file != ".."){
                if(is_file($dirname."/".$file)){
                    $content = file_get_contents($dirname."/".$file);
                    $content = str_replace('%title%', $this->title, $content);
                    file_put_contents($dirname."/".$file, $content);
                }
            }
        }
        closedir($dir);
	}

	private function replaceCompanyFiles(){
		$dirname = $this->outDir.'/company';
		$pattern = '/trailer_look: [a-z.-_0-9]*/'; // паттерн на компанию
		$retext = 'trailer_look: '.$this->paintJob->look; // Строка замены
		$dir = opendir($dirname);
		while (($file = readdir($dir)) !== false){
			if($file != "." && $file != ".."){
				if(is_file($dirname."/".$file)){
					$content = file_get_contents($dirname."/".$file);
					$content = preg_replace($pattern, $retext, $content);
					file_put_contents($dirname."/".$file, $content);
				}
			}
		}
		closedir($dir);
	}

    private function generateMarketTrailerContent($tr){
        $output_string = '';
        foreach($this->chassis->trailers as $key => $trailer){
            $trailer_name = $key == 0 ? $tr : $tr.'.'.$key;

            // trailer unit
            $output_string .= "trailer : ".($key != 0 ? "." : "trailer.").$trailer_name."\n{\n";
            $output_string .= "\taccessories[]: .".$trailer_name.".chassis\n";
            if(isset($trailer->body)) $output_string .= "\taccessories[]: .".$trailer_name.".body\n";
            if(isset($trailer->accessories)){
                foreach($trailer->accessories as $accessory){
                    $output_string .= "\taccessories[]: .".$trailer_name.".$accessory->name\n";
                }
            }
            if($this->accessory || $this->paintJob){
                if($trailer->with_accessory == 'on' && isset($this->accessory->def) && $this->accessory->def !== ''){
                    $output_string .= "\taccessories[]: .".$trailer_name.".cargo\n";
                }
                if($trailer->with_paint_job == 'on' && isset($this->paintJob->def) && $this->paintJob->def !== ''){
                    $output_string .= "\taccessories[]: .".$trailer_name.".paint_job\n";
                }
            }
            for($i = 0; $i < $trailer->axles; $i++){
                $output_string .= "\n\taccessories[]: .".$trailer_name.".wheel".$i;
            }
            if(isset($this->chassis->trailers[$key+1])){
                $output_string .= "\n\n\tslave_trailer: .".$tr.'.'.($key+1);
            }
            $output_string .= "\n}\n";

            // trailer accessories units
            // chassis unit
            $output_string .= "\nvehicle_accessory: .".$trailer_name.".chassis\n";
            $output_string .= "{\n\tdata_path: \"".$trailer->def."\"\n}\n";

            // body unit
            if(isset($trailer->body)){
                $output_string .= "\nvehicle_accessory: .".$trailer_name.".body\n";
                $output_string .= "{\n\tdata_path: \"".$trailer->body."\"\n}\n";
            }

            // addons units
            if(isset($trailer->accessories)){
                foreach($trailer->accessories as $accessory){
                    $output_string .= "\nvehicle_addon_accessory: .$trailer_name.$accessory->name\n";
                    $output_string .= "{\n\tdata_path: \"".$accessory->def."\"\n}\n";
                }
            }

            // wheels units
            $wheelsRules = Wheel::$rules;
            for($i = 0; $i < $trailer->axles; $i++){
                $output_string .= "\nvehicle_wheel_accessory: .$trailer_name.wheel$i\n{";

                if(key_exists($this->chassis->alias, $wheelsRules[$i])){
                    $isRequired = isset($wheelsRules[$i][$this->chassis->alias]['required']) && $wheelsRules[$i][$this->chassis->alias]['required'];
                    if($isRequired || (!$isRequired && !$this->chassis->customWheels)){
                        if(isset($wheelsRules[$i][$this->chassis->alias]['offset'])){
                            $output_string .= "\n\toffset: ".$wheelsRules[$i][$this->chassis->alias]['offset'];
                        }else{
                            $output_string .= "\n\toffset: ".($i*2);
                        }
                        $output_string .= "\n\tdata_path: \"".$wheelsRules[$i][$this->chassis->alias]['def']."\"";
                    }else{
                        $output_string .= "\n\toffset: ".($i*2)."\n\tdata_path: \"".$this->chassis->wheels->def."\"";
                    }
                }else{
                    $output_string .= "\n\toffset: ".($i*2)."\n\tdata_path: \"".$this->chassis->wheels->def."\"";
                }

                $output_string .= "\n}\n";
            }

            // cargo and paint_job units
            if($this->accessory || $this->paintJob){
                if($trailer->with_accessory == 'on' && isset($this->accessory->def) && $this->accessory->def !== ''){
                    $output_string .= "\nvehicle_accessory: .$trailer_name.cargo\n{\n";
                    $output_string .= "\tdata_path: \"".$this->accessory->getDefBySuffix(explode(',', $trailer->suitable_suffix))."\"\n}\n";
                }
                if($trailer->with_paint_job == 'on' && isset($this->paintJob->def) && $this->paintJob->def !== ''){
                    $output_string .= "\nvehicle_paint_job_accessory: .$trailer_name.paint_job\n{\n";
                    if($this->paintJob->with_color){
                        $output_string .= "\tbase_color: (".$this->paintJob->color.")\n";
                    }
                    $output_string .= "\tdata_path: \"".$this->paintJob->def."\"\n}\n";
                }
            }

            $output_string .= "\n\n";
        }

        return $output_string;
	}

    private function generateDealerTrailerContent(){

        $output_string = "SiiNunit\n{\n";
        foreach($this->chassis->trailers as $key => $trailer){

            // trailer unit
            $output_string .= "trailer : .$key\n{\n";
            if($key == 0){
                $output_string .= "\ttrailer_definition: ".Chassis::$defaultOwnableDef[$this->game]."\n\n";
                $output_string .= "\taccessories[]: .$key.data\n";
            }
            $output_string .= "\taccessories[]: .$key.chassis\n";
            $output_string .= "\taccessories[]: .$key.body\n";
            if(isset($trailer->accessories)){
                foreach($trailer->accessories as $accessory){
                    $output_string .= "\taccessories[]: .$key.$accessory->name\n";
                }
            }
            if($this->accessory || $this->paintJob){
                if($trailer->with_accessory == 'on' && isset($this->accessory->def) && $this->accessory->def !== ''){
                    $output_string .= "\taccessories[]: .$key.cargo\n";
                }
            }
            if($this->chassis->supports_wheels && !$this->chassis->custemWheels){
                $output_string .= "\taccessories[]: .$key.paint_job\n";
            }
            for($i = 0; $i < $trailer->axles; $i++){
                switch(Wheel::getWheelState($i, $this->chassis)){
                    case 2:
                        $output_string .= "\n\taccessories[]: .$key.tire".$i."\n";
                        $output_string .= "\taccessories[]: .$key.disk".$i."\n";
                        $output_string .= "\taccessories[]: .$key.hub".$i."\n";
                        $output_string .= "\taccessories[]: .$key.nuts".$i."\n";
                        break;
                    case 3:
                    case 1:
                    default:
                        $output_string .= "\taccessories[]: .$key.wheel".$i."\n";
                        break;
                }
            }
            if(isset($this->chassis->trailers[$key+1])){
                $output_string .= "\n\tslave_trailer: .".($key+1);
            }
            $output_string .= "\n}\n\n";

            // trailer accessories units
            //data unit
            if($key == 0) $output_string .= "vehicle_accessory: .$key.data\n{\n\tdata_path: \"/def/vehicle/tmg/data.sii\"\n}\n";

            // chassis unit
            $output_string .= "\nvehicle_accessory: .$key.chassis\n";
            $output_string .= "{\n\tdata_path: \"".$trailer->def."\"\n}\n";

            // body unit
            $output_string .= "\nvehicle_accessory: .$key.body\n";
            $output_string .= "{\n\tdata_path: \"".($trailer->body ?? '/def/vehicle/tmg/body.sii')."\"\n";
            $output_string .= "}\n\n";

            // addons units
            if(isset($trailer->accessories)){
                foreach($trailer->accessories as $accessory){
                    $output_string .= "vehicle_addon_accessory: .$key.$accessory->name\n";
                    $output_string .= "{\n\tdata_path: \"".$accessory->def."\"\n}\n\n";
                }
            }

            // wheels units
            for($i = 0; $i < $trailer->axles; $i++){
                switch(Wheel::getWheelState($i, $this->chassis)){
                    case 2:
                        foreach(Wheel::$defaultOwnableWheels[$this->game] as $name => $def){
                            $output_string .= "vehicle_wheel_accessory: .$key.$name$i\n";
                            $output_string .= "{\n\toffset: ".($i*2)."\n";
                            $output_string .= "\tdata_path: \"$def\"\n}\n\n";
                        }
                        break;
                    case 3:
                        $wheelsRules = Wheel::$rules;
                        $output_string .= "vehicle_wheel_accessory: .$key.wheel$i\n{";
                        if(isset($wheelsRules[$i][$this->chassis->alias]['offset'])){
                            $output_string .= "\n\toffset: ".$wheelsRules[$i][$this->chassis->alias]['offset'];
                        }else{
                            $output_string .= "\n\toffset: ".($i*2);
                        }
                        $output_string .= "\n\tdata_path: \"".$wheelsRules[$i][$this->chassis->alias]['def']."\"";
                        $output_string .= "\n}\n\n";
                        break;
                    case 1:
                    default:
                        $output_string .= "vehicle_wheel_accessory: .$key.wheel$i\n{";
                        $output_string .= "\n\toffset: ".($i*2)."\n\tdata_path: \"".$this->chassis->wheels->def."\"";
                        $output_string .= "\n}\n\n";
                        break;
                }
            }

            // cargo and paint_job units
            if($trailer->with_accessory == 'on' && $this->accessory && isset($this->accessory->def) && $this->accessory->def !== ''){
                $output_string .= "vehicle_accessory: .$key.cargo\n{\n";
                $output_string .= "\tdata_path: \"".$this->accessory->getDefBySuffix(explode(',', $trailer->suitable_suffix))."\"\n}\n\n";
            }
            if($trailer->with_paint_job == 'on' && isset($this->paintJob->def) && $this->paintJob->def !== ''){
                $output_string .= "vehicle_paint_job_accessory: .$key.paint_job\n{\n";
                if($this->paintJob->with_color){
                    $output_string .= "\tbase_color: (".$this->paintJob->color.")\n";
                    $output_string .= "\tdata_path: \"".Paint::$defaultOwnablePaintJob[$this->game]."\"\n}\n\n";
                }else{
                    $output_string .= "\tdata_path: \"".$this->paintJob->def."\"\n}\n\n";
                }
            }elseif($this->chassis->supports_wheels && !$this->chassis->custemWheels){
                $output_string .= "vehicle_paint_job_accessory: .$key.paint_job\n{\n";
                $output_string .= "\tdata_path: \"".Paint::$defaultOwnablePaintJob[$this->game]."\"\n}\n";
            }

            $output_string .= "\n\n";
        }
        $output_string .= "}";
        return $output_string;
    }

    /**
     * Receives array of rows of input file
     * Search each row if it paint_job def
     * or if it wheel row
     * Replaces row by two rows
     * Returns whole file by string
     */
    private function generatePaintableTrailersContent($rows){
        foreach($rows as $key => $row){
            if(stripos($row, 'paint_job/') !== false){
                $rows[$key] = "\tbase_color: (".$this->paintJob->color.")\n".$rows[$key];
            }
            if($this->chassis->customWheels && stripos($row,'/def/vehicle/t_wheel/') !== false){
                $rows[$key] = "\t\tdata_path: \"".$this->chassis->wheels->def."\"";
            }
        }
        $rows = implode("\n", $rows);
        return $rows;
    }

    private function generateRandomTrailerContent($trailer_name){
        $dlc_id = Dlc::whereIn('name', $this->dlc)->get()->keyBy('id')->keys()->toArray();
        $to_random = Chassis::where(['can_all_companies' => 1, 'game' => $this->game])->where(function($q) use ($dlc_id) {
            return $q->whereIn('dlc_id', $dlc_id)->orWhereNull('dlc_id');
        })->get();
        $random_chassis = $to_random->random();
        $random_chassis->setWheels($this->chassis->wheels);

        $random_paint_job = new Paint();
        $random_paint_job->def = $random_chassis->default_paint_job;
        $random_paint_job->with_color = $this->paintJob->with_color;
        $random_paint_job->color = $this->paintJob->color;

        $original_chassis = $this->chassis;
        $original_paint_job = $this->paintJob;
        $this->paintJob = $random_paint_job;
        $this->chassis = $random_chassis;
        $content = $this->generateMarketTrailerContent($trailer_name);
        $this->chassis = $original_chassis;
        $this->paintJob = $original_paint_job;

        return $content;
    }

}