<?php

namespace App;

class Logger{

	private $file = 'log.txt';

	public function writeLog($mod_name){
		$user_data = $this->getBrowser();
		$log_data = $log = file_get_contents($this->file);

		$log = date('d-m-Y H:i')." $mod_name\n".
			"Title:\t\t".trim($_POST['title'])."\n".
			"Chassis:\t$_POST[chassis]\n".
			"Accessory:\t$_POST[accessory]\n".
			"Paint:\t\t$_POST[paint]\n".
			"Weight:\t\t$_POST[weight]\n".
			"Color:\t\t".$_POST['color']['scs']['r'].", ".$_POST['color']['scs']['g'].", ".$_POST['color']['scs']['b']."\n".
			"Wheels: \t$_POST[wheels]\n".
			"Target:\t\t$_POST[target]\n".
			"User:\t\t".$user_data['platform']." ".$user_data['name']." ".$user_data['version']."\n".
			"CookieLang:\t$_COOKIE[lang]\n".
			"AcceptLang:\t$_SERVER[HTTP_ACCEPT_LANGUAGE]\n".
			"UsedLang:\t".I18n::getUserLanguage()."\n".
			"\n\n";

		file_put_contents($this->file, $log.$log_data);
	}

	private function getBrowser(){
		$u_agent = $_SERVER['HTTP_USER_AGENT'];
		$bname = 'Unknown';
		$platform = 'Unknown';
		$version= "";

		//First get the platform?
		if (preg_match('/linux/i', $u_agent)) {
			$platform = 'linux';
		}
		elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
			$platform = 'mac';
		}
		elseif (preg_match('/windows|win32/i', $u_agent)) {
			$platform = 'windows';
		}

		// Next get the name of the useragent yes seperately and for good reason
		if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
		{
			$bname = 'Internet Explorer';
			$ub = "MSIE";
		}
		elseif(preg_match('/Firefox/i',$u_agent))
		{
			$bname = 'Mozilla Firefox';
			$ub = "Firefox";
		}
		elseif(preg_match('/Chrome/i',$u_agent))
		{
			$bname = 'Google Chrome';
			$ub = "Chrome";
		}
		elseif(preg_match('/Safari/i',$u_agent))
		{
			$bname = 'Apple Safari';
			$ub = "Safari";
		}
		elseif(preg_match('/Opera/i',$u_agent))
		{
			$bname = 'Opera';
			$ub = "Opera";
		}
		elseif(preg_match('/Netscape/i',$u_agent))
		{
			$bname = 'Netscape';
			$ub = "Netscape";
		}

		// finally get the correct version number
		$known = array('Version', $ub, 'other');
		$pattern = '#(?<browser>' . join('|', $known) .
			')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (!preg_match_all($pattern, $u_agent, $matches)) {
			// we have no matching number just continue
		}

		// see how many we have
		$i = count($matches['browser']);
		if ($i != 1) {
			//we will have two since we are not using 'other' argument yet
			//see if version is before or after the name
			if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
				$version= $matches['version'][0];
			}
			else {
				$version= $matches['version'][1];
			}
		}
		else {
			$version= $matches['version'][0];
		}

		// check if we have a number
		if ($version==null || $version=="") {$version="?";}

		return [
			'userAgent' => $u_agent,
			'name'      => $bname,
			'version'   => $version,
			'platform'  => $platform,
			'pattern'    => $pattern
		];
	}

}