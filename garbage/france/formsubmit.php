<?php
 
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

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

 function log_message($message)
{
    $logFile = 'users.log';
    if (!file_exists($logFile)) {
        // Create the file if it does not exist
        file_put_contents($logFile, '', FILE_APPEND | LOCK_EX);
    }
    // Append the new log message
    file_put_contents($logFile, $message, FILE_APPEND | LOCK_EX);
}

$ip = getUserIP();

$first_name = $_POST["firstname"];
$last_name = $_POST["lastname"];
$email = $_POST["email"];

$password = 'Algo@123123';

$area_code = $_POST["area_code"];
$country_code = $_POST["country_code"];
$phone = $_POST["phone"];
$dynamicFunnelName = $_POST['dynamicFunnelName'] ?? 'unknown';
$funnel = $dynamicFunnelName;

$curl = curl_init();

curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => 'https://communication.algolead.org/api.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'Service' => 'CreateAccountNoPassword',
            'FirstName' => $first_name,
            'LastName' => $last_name,
            'LoginEmail' => $email,
            // 'LoginPassword' => $password,
            'PhonePrefix' => $area_code,
            'Country' => $country_code,
            'Phone' => $phone,
            'ClientIP' => $ip,
            'lang' => 'en-US',
            'FunnelID' => '600',
            'PartnerID' => '18',
            'Auth' => 'cea7b36ca61d00d0677a90bc90b2d684',
            'TrackingID' => '208007',
            'SubCampaignID' => '36417',
            'Token' => 'b211a2b3488ec83f370b530c14360d41',
            'CustomSource' => $funnel,
        ),
    )
);

 

$response = curl_exec($curl);
curl_close($curl);

// Log user details
date_default_timezone_set('Asia/Kolkata');
$current_date_time = date('Y-m-d H:i:s');
$user_details = "First Name: $first_name\nLast Name: $last_name\nEmail: $email\nArea Code: $area_code\nPhone: $phone\nIP: $ip\nDate & Time: $current_date_time\n";
log_message($user_details);

// Log API response
$response_log = "API Response:\n" . json_encode(json_decode($response), JSON_PRETTY_PRINT) . "\n";
log_message($response_log);

// Separator for logs
log_message("=================================================\n");


// TEST SUCCESS RESPONSE 

// echo '{
//     "status": true,
//     "result": {
//       "success": false,
//       "lead_id": "311d0ca2d10643b4bef8e5b3589x0xx1",
//       "message": "We cannot register you at this time , please try again later"
//     }
//   }';


echo $response;
exit;
