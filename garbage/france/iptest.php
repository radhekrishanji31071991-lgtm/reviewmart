<?php

 function cleanIP($ip) {
 $tryIP=preg_replace("/[^0-9a-f\.\,\:]/i","",$ip);
 if(preg_match("/\,/",$tryIP)) {
 $optionalIps=array_filter(explode(",",$tryIP));
 foreach ($optionalIps as $key => $oip) {
 if(
 filter_var($oip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE)
 &&
 filter_var($oip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE)
 )
 $cleanIP=$oip;
 }
 } else $cleanIP=$tryIP;
 if(
 filter_var($cleanIP, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE)
 &&
 filter_var($cleanIP, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE)
 ) return $cleanIP;
 return false;
 }
 

 function getUserIP() {
  if(!isset($ip) || empty($ip)) $ip = cleanIP(@$_SERVER['HTTP_X_FORWARDED_FOR']);
  if(!isset($ip) || empty($ip)) $ip = cleanIP(@$_SERVER['HTTP_CLIENT_IP']);
  if(!isset($ip) || empty($ip)) $ip = cleanIP($_SERVER['REMOTE_ADDR']);
  return $ip;
 }

 echo "IP: ".getUserIP();
 
 exit;
?>