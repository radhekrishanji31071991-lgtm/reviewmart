<?php
// Define the password
$correct_password = 'algolead@0291';
$error_message = '';

// Check if the password is submitted
if (isset($_POST['password'])) {
    if ($_POST['password'] !== $correct_password) {
        // If password is incorrect, set an error message
        $error_message = 'Incorrect password';
    }
}

// Show the login form if the password is not submitted or incorrect
if (!isset($_POST['password']) || $_POST['password'] !== $correct_password) {
    echo '<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>';

    echo '<div class="container">';
    if ($error_message) {
        echo '<div class="error">' . htmlspecialchars($error_message) . '</div>';
    }
    echo '<form method="POST">';
    echo '<div class="form-group">';
    echo 'Password: <input type="password" name="password" />';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<input type="submit" value="Submit" />';
    echo '</div>';
    echo '</form>';
    echo '</div>';
    exit; // Stop the script execution
}

// Your original script starts here
$curl = curl_init();

// Get current date and date 30 days ago
$create_time_to = date('Y-m-d H:i:s');
$create_time_from = date('Y-m-d H:i:s', strtotime('-30 days'));

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
            'Service' => 'DepositsList',
            'Token' => 'b211a2b3488ec83f370b530c14360d41',
            'PartnerID' => '18',
            'Auth' => 'cea7b36ca61d00d0677a90bc90b2d684',
            'TrackingID' => '208007',
            'CreateTimeFrom' => $create_time_from,
            'CreateTimeTo' => $create_time_to,
        ),
    )
);

$response = curl_exec($curl);
curl_close($curl);

// Handle the response
if ($response === false) {
    echo 'Curl error: ' . curl_error($curl);
} else {
    $response_data = json_decode($response, true);

    echo "<h1>DepositsList</h1>";
    echo "<h3>Returns deposits list by affiliate based on TrackingID</h3>";
    echo "<hr></hr>";
    if (json_last_error() === JSON_ERROR_NONE) {
        echo '<pre>' . json_encode($response_data, JSON_PRETTY_PRINT) . '</pre>';
    } else {
        echo $response;
    }
}
?>
