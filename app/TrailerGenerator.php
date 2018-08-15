<?php

namespace App;

use Request;
use ZipArchive;

class TrailerGenerator extends ModGenerator{

	public $accessory;
	public $filesDir = 'resources/files/trailers';
	public $dlc = ['base'];

	public function load($chassis, $accessory, $paintJob){
		$this->title = strlen(trim($_POST['title'])) == 0 ? 'Mod' : trim($_POST['title']);
		$this->chassis = $chassis;
		$this->accessory = $accessory;
		$this->paintJob = $paintJob;
		$this->dlc = $this->getDLCArray();
		$this->game = Request::input('target');
		
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
		if($this->chassis->weight !== false && is_numeric($this->chassis->weight)){
			$this->copyCargoFiles();
			$this->replaceCargoFiles();
		}
		$this->copyImage();
		if($this->zip){
            $this->fileName = $this->zipFiles();
            $this->removeOutDirectory();
        }else{
		    return $this->outDir;
        }
        return true;
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
		return array_unique($array);
	}

	private function copyTrailerFiles(){
		mkdir($this->outDir.'/vehicle/');
		mkdir($this->outDir.'/vehicle/trailer');
		foreach($this->dlc as $dlc){
			$dir = $this->filesDir.'/'.$this->game.'/'.$dlc.'/trailers';
			if($dir_files = scandir($dir)){
				foreach($dir_files as $file){
					if(is_file($dir .'/'. $file)){
						copy($dir .'/'. $file, $this->outDir.'/vehicle/trailer/'. $file);
					}elseif($file != '.' && $file != '..' && in_array($file, $this->dlc)){
						$new_dir = $this->filesDir.'/'.$_POST['target'].'/'.$dlc.'/trailers/'.$file;
						if($new_dir_files = scandir($new_dir)){
							foreach($new_dir_files as $new_file){
								if(is_file($new_dir .'/'. $new_file)){
									copy($new_dir .'/'. $new_file, $this->outDir.'/vehicle/trailer/'. $new_file);
								}
							}
						}
					}
				}
			}
		}
	}

	private function copyCompanyFiles(){
		mkdir($this->outDir.'/company');
		foreach($this->dlc as $dlc){
			$dir = $this->filesDir.'/'.$this->game.'/'.$dlc.'/companies';
			if(is_dir($dir) && $dir_files = scandir($dir)){
				foreach($dir_files as $file){
					if(is_file($dir . '/' . $file)){
						copy($dir . '/' . $file, $this->outDir.'/company/' . $file);
					}
				}
			}
		}
	}

	private function copyCargoFiles(){
		mkdir($this->outDir.'/cargo');
		foreach($this->dlc as $dlc){
			$dir = $this->filesDir.'/'.$this->game.'/'.$dlc.'/cargos';
			if($inner_dirs = scandir($dir)){
				foreach($inner_dirs as $inner_dir){
					if($inner_dir !== '.' && $inner_dir !== '..'){
						$out_dir = $this->outDir.'/cargo/'.$inner_dir;
						is_dir($out_dir) ? : mkdir($out_dir);
						foreach(scandir($dir.'/'.$inner_dir) as $file){
							if($file !== '.' && $file !== '..'){
								copy($dir . '/' . $inner_dir .'/'. $file, $out_dir .'/'. $file);
							}
						}
					}

				}
			}
		}
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
					$row_with_accessory_name = stripos($rows[2], 'trailer_definition') !== false ? $rows[4] : $rows[2];
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
		foreach(scandir($dirname) as $inner_dir){
			if($inner_dir !== '.' && $inner_dir !== '..'){
				foreach(scandir($dirname.'/'.$inner_dir) as $file){
					if($file !== '.' && $file !== '..'){
						$content = file_get_contents($dirname.'/'.$inner_dir.'/'.$file);
						$content = preg_replace('/mass: [0-9]*/', 'mass: '.$this->chassis->weight.'000', $content);
						file_put_contents($dirname.'/'.$inner_dir.'/'.$file, $content);
					}
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
		for($i = 0; $i < $this->chassis->axles; $i++){
			$output_string .= "\nvehicle_wheel_accessory: " . $accessory_name . ".trwheel" . $i . "\n{";
			if($this->chassis->alias == 'schw_overweight' && $i == 2){
				$output_string .= "\n\toffset: 0\n\t\tdata_path: \"/def/vehicle/t_wheel/overweight_f.sii\"";
			}elseif((!$this->chassis->customWheels) &&
				($this->chassis->alias == 'chemical_long' ||
				$this->chassis->alias == 'acid_long') && $i == 0){
				$output_string .= "\n\toffset: 0\n\t\tdata_path: \"/def/vehicle/t_wheel/front.sii\"";
			}else{
				$output_string .= "\n\toffset: ".($i*2)."\n\t\tdata_path: \"".$this->chassis->wheels->def."\"";
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

		if(is_dir($this->outDir.'/vehicle')){
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