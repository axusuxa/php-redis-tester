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

echo gethostbyname('redis');
?>