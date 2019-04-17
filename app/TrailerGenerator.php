<?php

namespace App;

use Request;

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
		$this->copyDealerFiles();
		$this->replaceDealerFile();
		if($this->chassis->weight !== false && is_numeric($this->chassis->weight)){
			$this->copyCargoFiles();
			$this->copyCountryFiles();
			$this->copyTrailerDefsFiles();
			$this->replaceCargoFiles();
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
        if(is_dir($this->filesDir.'/'.$this->game.'/ownable')) {
            $this->rcopy($this->filesDir . '/' . $this->game . '/ownable', $this->outDir . '/vehicle');
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

	private function copyCargoFiles(){
		mkdir($this->outDir.'/cargo');
		foreach($this->dlc as $dlc){
            $this->rcopy($this->filesDir.'/'.$this->game.'/'.$dlc.'/cargos', $this->outDir.'/cargo');
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

    private function copyCountryFiles(){
        mkdir($this->outDir.'/vehicle/trailer_defs');
        $this->rcopy($this->filesDir.'/'.$this->game.'/base/country', $this->outDir.'/country');
	}

	private function replaceTrailerFiles(){
		$coupled_trailers = Chassis::where('coupled', 1)->get()->keyBy('alias')->toArray();
		$dirname = $this->outDir.'/vehicle/trailer';
		if(!is_dir($dirname)) mkdir($dirname);
		$dir = opendir($dirname);
		while (($file = readdir($dir)) !== false){
			if($file != "." && $file != ".."){
				if(is_file($dirname."/".$file)){
					$rows = file($dirname."/".$file, FILE_IGNORE_NEW_LINES);
					$trailer_name = trim(preg_split('/trailer\./', $rows[0])[1]);
					$row_with_accessory_name = array_first($rows, function($value, $key){
                        return stripos($value, 'accessories') !== false;
                    });
					$accessory_name = trim(preg_replace('/\.[a-z0-9]+$/', '', explode(':', $row_with_accessory_name)[1]));
					if($this->chassis->alias == 'paintable'){
						$content = $this->generatePaintableTrailersContent($rows);
						if(stripos($content,'base_color') === false){
							$content = $this->generateRandomTrailerContent($trailer_name, $accessory_name);
						}
					}else{
						key_exists($this->chassis->alias, $coupled_trailers) ?
							$content = $this->generateCoupledTrailerContent($trailer_name) :
							$content = $this->generateTrailerContent($trailer_name, $accessory_name);
					}
					file_put_contents($dirname."/".$file, $content);
				}
			}
		}
		closedir($dir);
	}

    private function replaceDealerFile(){
        $file = $this->outDir .'/vehicle/trailer_dealer/tmg/tmg_trailer.sii';
        $content = $this->chassis->coupled ? $this->generateCoupledDealerFileContent() : $this->generateDealerFileContent();
        file_put_contents($file, $content);
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

	private function replaceCargoFiles(){
		$dirname = $this->outDir.'/cargo';
		foreach(scandir($dirname) as $file){
		    if($file !== '.' && $file !== '..'){
                if(is_file($dirname.'/'.$file)){
                    $content = file_get_contents($dirname.'/'.$file);
                    $content = str_replace('%weight%', $this->chassis->weight.'000', $content);
                    file_put_contents($dirname.'/'.$file, $content);
                }
            }
		}
	}

	private function generateTrailerContent($trailer_name, $accessory_name){
		$output_string = "trailer : trailer.".$trailer_name."\n{\n\taccessories[]: ".$accessory_name.".tchassis";
		for($i = 0; $i < $this->chassis->axles; $i++){
			$output_string .= "\n\taccessories[]: ".$accessory_name.".trwheel".$i;
		}
		if($this->accessory || $this->paintJob){
			if(isset($this->accessory->def) && $this->accessory->def !== ''){
				$output_string .= "\n\taccessories[]: ".$accessory_name.".cargo";
			}
			if(isset($this->paintJob->def) && $this->paintJob->def !== ''){
				$output_string .= "\n\taccessories[]: ".$accessory_name.".paint_job";
			}
		}
		$output_string .= "\n}\n\nvehicle_accessory: ".$accessory_name.".tchassis\n{
		data_path: \"".$this->chassis->def."\"\n}\n";

		$wheelsRules = Wheel::$rules;
		for($i = 0; $i < $this->chassis->axles; $i++){
            $output_string .= "\nvehicle_wheel_accessory: " . $accessory_name . ".trwheel" . $i . "\n{";

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

		if($this->accessory || $this->paintJob){
			if(isset($this->accessory->def) && $this->accessory->def !== ''){
				$output_string .= "\nvehicle_accessory: ".$accessory_name.".cargo\n{\n\t\tdata_path: \"".$this->accessory->def."\"\n}\n";
			}
			if(isset($this->paintJob->def) && $this->paintJob->def !== ''){
				$output_string .= "\nvehicle_paint_job_accessory: ".$accessory_name.".paint_job\n{\n";
				if(stripos($this->paintJob->def ,'default.sii')){
					$output_string .= "\tbase_color: (".$this->paintJob->color.")\n";
				}
				$output_string .= "\t\tdata_path: \"".$this->paintJob->def."\"\n}\n";
			}
		}
		return $output_string;
	}

	private function generateCoupledTrailerContent($trailer_name){
		$content = null;
		$file = $this->chassis->alias .
            ($this->accessory && $this->accessory->def === '' ? '_empty' : '') .
            '.sii';
        $content = file_get_contents($this->filesDir.'/'.$this->game.'/coupled_templates/'.$file);
		if($this->paintJob){
			$content = str_replace(['%color%'], $this->paintJob->color ? "base_color: (".$this->paintJob->color.")" : '', $content);
			$content = str_replace(['%paint_job%'], $this->paintJob->def, $content);
			$content = str_replace(['%paint_job_s%'], str_replace('profiliner', 'proficarrier', $this->paintJob->def), $content);
		}
		$to_replace = ['box_pup_2', 'box_pup_3', 'box_rm_2', 'reefer_pup_2', 'reefer_pup_3', 'reefer_rm_2', '%trailer%'];
		$content = str_replace($to_replace, $trailer_name, $content);
        if($this->accessory && $this->accessory->def !== '') $content = str_replace(['%cargo%'], $this->accessory->def, $content);
		$content = str_replace(['%wheel%'], $this->chassis->wheels->def, $content);

		return $content;
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

	private function generateRandomTrailerContent($trailer_name, $accessory_name){
		$to_random = Chassis::where(['can_random' => 1, 'game' => $this->game])->get();
		$random_chassis = $to_random->random();
		$random_chassis->setWheels($this->chassis->wheels);

		$random_paint_job = new Paint();
		$random_paint_job->def = $random_chassis->default_paint_job;
		$random_paint_job->color = $this->paintJob->color;

		$original_chassis = $this->chassis;
		$original_paint_job = $this->paintJob;
		$this->paintJob = $random_paint_job;
		$this->chassis = $random_chassis;
		$content = $this->generateTrailerContent($trailer_name, $accessory_name);
		$this->chassis = $original_chassis;
		$this->paintJob = $original_paint_job;

		return $content;
	}

    private function generateDealerFileContent(){
        $content = "SiiNunit\n{\ntrailer : .tmg.ownable.trailer\n{\n";
        $content .= "\ttrailer_definition: ".Chassis::$defaultOwnableDef[$this->game]."\n\n";
        $content .= "\taccessories[]: .data\n\taccessories[]: .chassis\n\taccessories[]: .body\n\n";
        for($i = 0; $i < $this->chassis->axles; $i++){
            switch(Wheel::getWheelState($i, $this->chassis)){
                case 2:
                    $content .= "\taccessories[]: .tire".$i."\n";
                    $content .= "\taccessories[]: .disk".$i."\n";
                    $content .= "\taccessories[]: .hub".$i."\n";
                    $content .= "\taccessories[]: .nuts".$i."\n\n";
                    break;
                case 3:
                case 1:
                default:
                    $content .= "\taccessories[]: .wheel".$i."\n";
                    break;
            }
        }
        if($this->accessory && isset($this->accessory->def) && $this->accessory->def !== ''){
            $content .= "\taccessories[]: .cargo\n";
        }
        if($this->chassis->supports_wheels && !$this->chassis->custemWheels){
            $content .= "\taccessories[]: .paint_job\n";
        }
        $content .= "}\n\n";

        $content .= "vehicle_accessory: .data\n{\n\tdata_path: \"/def/vehicle/tmg/data.sii\"\n}\n\n";
        $content .= "vehicle_accessory: .chassis\n{\n\tdata_path: \"".$this->chassis->def."\"\n}\n\n";
        $content .= "vehicle_accessory: .body\n{\n\tdata_path: \"/def/vehicle/tmg/body.sii\"\n}\n\n";

        for($i = 0; $i < $this->chassis->axles; $i++){
            switch(Wheel::getWheelState($i, $this->chassis)){
                case 2:
                    $content .= "vehicle_wheel_accessory: .tire$i\n{\n\toffset: ".($i*2)."\n\tdata_path: \"".Wheel::$defaultOwnableWheels[$this->game]['tire']."\"\n}\n\n";
                    $content .= "vehicle_wheel_accessory: .disk$i\n{\n\toffset: ".($i*2)."\n\tdata_path: \"".Wheel::$defaultOwnableWheels[$this->game]['disk']."\"\n}\n\n";
                    $content .= "vehicle_wheel_accessory: .hub$i\n{\n\toffset: ".($i*2)."\n\tdata_path: \"".Wheel::$defaultOwnableWheels[$this->game]['hub']."\"\n}\n\n";
                    $content .= "vehicle_wheel_accessory: .nuts$i\n{\n\toffset: ".($i*2)."\n\tdata_path: \"".Wheel::$defaultOwnableWheels[$this->game]['nuts']."\"\n}\n\n";
                    break;
                case 3:
                    $wheelsRules = Wheel::$rules;
                    $content .= "vehicle_wheel_accessory: .wheel".$i."\n{";
                    if(isset($wheelsRules[$i][$this->chassis->alias]['offset'])){
                        $content .= "\n\toffset: ".$wheelsRules[$i][$this->chassis->alias]['offset'];
                    }else{
                        $content .= "\n\toffset: ".($i*2);
                    }
                    $content .= "\n\tdata_path: \"".$wheelsRules[$i][$this->chassis->alias]['def']."\"";
                    $content .= "\n}\n\n";
                    break;
                case 1:
                default:
                    $content .= "vehicle_wheel_accessory: .wheel".$i."\n{";
                    $content .= "\n\toffset: ".($i*2)."\n\tdata_path: \"".$this->chassis->wheels->def."\"";
                    $content .= "\n}\n\n";
                    break;
            }
        }

        if($this->accessory && isset($this->accessory->def) && $this->accessory->def !== ''){
            $content .= "vehicle_accessory: .cargo\n{\n\tdata_path: \"".$this->accessory->def."\"\n}\n\n";
        }
        if(isset($this->paintJob->def) && $this->paintJob->def !== ''){
            $content .= "vehicle_paint_job_accessory: .paint_job\n{\n";
            if(stripos($this->paintJob->def ,'default.sii')){
                $content .= "\tbase_color: (".$this->paintJob->color.")\n";
            }
            $content .= "\tdata_path: \"".$this->paintJob->def."\"\n}\n\n";
        }elseif($this->chassis->supports_wheels && !$this->chassis->custemWheels){
            $content .= "vehicle_paint_job_accessory: .paint_job\n{\n";
            $content .= "\tdata_path: \"".Paint::$defaultOwnablePaintJob[$this->game]."\"\n}\n\n";
        }
        $content .= "}";
        return $content;
	}

    private function generateCoupledDealerFileContent(){
        $content = null;
        $content = file_get_contents($this->filesDir.'/'.$this->game.'/coupled_templates/ownable/'.$this->chassis->alias.'.sii');
        if($this->paintJob){
            $content = str_replace(['%color%'], $this->paintJob->color ? "base_color: (".$this->paintJob->color.")" : '', $content);
            $content = str_replace(['%paint_job%'], $this->paintJob->def, $content);
        }
        if($this->accessory && $this->accessory->def !== '') $content = str_replace(['%cargo%'], $this->accessory->def, $content);
//        $content = str_replace(['%wheel%'], $this->chassis->wheels->def, $content);

        return $content;
	}

}