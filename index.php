<?php
function getname($ip){
   $url = $ip.":9100/metrics";
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_TIMEOUT,10);
   $output = curl_exec($ch);
   curl_close($ch);
   return $output;
}

function addport($ips,$port){
    foreach ($ips as &$ip)
        $ip = $ip.":".$port;
    return $ips;
}

require "predis/autoload.php";
PredisAutoloader::register();

try {
	$redis = new PredisClient();

	// This connection is for a remote server
	
		$redis = new PredisClient(array(
		    "scheme" => "tcp",
		    "host" => "redis",
		    "port" => 6379
		));
	
}
catch (Exception $e) {
	die($e->getMessage());
}

echo gethostbyname('redis');
?>