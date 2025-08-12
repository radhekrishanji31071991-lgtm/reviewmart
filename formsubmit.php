<?php

require_once 'helper.php';
require_once 'vendor/autoload.php'; // Load Valitron Validator

use Valitron\Validator;

// Input Validation
$v = new Validator($_POST);
$v->rule('required', ['firstname', 'lastname', 'email', 'phone_code', 'country_code', 'phone', 'dynamicFunnelName']);
$v->rule('email', 'email');
$v->rule('integer', 'phone_code');
$v->rule('regex', 'phone', '/^\d{7,15}$/'); // Phone should be between 7 and 15 digits

if (!$v->validate()) {
    // Return validation errors as JSON
    echo json_encode(['status' => false, 'errors' => $v->errors()]);
    exit;
}

// Clean and Retrieve IP
$ip = getUserIP();

$first_name = $_POST["firstname"];
$last_name = $_POST["lastname"];
$email = $_POST["email"];
$password = 'Algo123123';
$phone_code = $_POST["phone_code"];
$country_code = $_POST["country_code"];
$phone = $_POST["phone"];
$dynamicFunnelName = $_POST['dynamicFunnelName'] ?? 'unknown';
$funnel = $dynamicFunnelName;


// // TEST FAILURE RESPONSE
// echo '{
//     "status": true,
//     "result": {
//       "success": false,
//       "lead_id": "311d0ca2d10643b4bef8e5b3589x0xx1",
//       "message": "We cannot register you at this time , please try again later"
//     }
//   }';
// exit;

// // TEST FAILURE RESPONSE 2
// echo '{
//     "status": "Failed",
//     "errors": "User Already Exists"
// }';
// exit;

// // TEST SUCCESS RESPONSE
// echo '{
//     "status": "Success",
//     "data": {
//         "RedirectTo": "https:\/\/tinyurl.com\/2a8rj2es",
//         "LoginID": "428291420",
//         "Email": "rarara@gmail.com",
//         "Password": "Hn3Gc1Xz",
//         "UserID": "27384311",
//         "BrandID": "2871",
//         "AccountID": "23145547"
//     }
// }';
// exit;


// Log User Details
date_default_timezone_set('Asia/Kolkata');
$current_date_time = date('Y-m-d H:i:s');
$user_details = "Keyword: $funnel\nFirst Name: $first_name\nLast Name: $last_name\nEmail: $email\nArea Code: $phone_code\nPhone: $phone\nIP: $ip\nDate & Time: $current_date_time\n";
log_message($user_details);

// Send Data to API
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
            'PhonePrefix' => $phone_code,
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


// Log API Response
$response_log = "API Response:\n" . json_encode(json_decode($response), JSON_PRETTY_PRINT) . "\n";
log_message($response_log);

// Separator for logs
log_message("=================================================\n");





// Return API Response
echo $response;
exit;

 