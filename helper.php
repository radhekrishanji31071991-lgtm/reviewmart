<?php

/**
 * Cleans and validates the IP address.
 */
function cleanIP($ip) {
    $tryIP = preg_replace("/[^0-9a-f\.\,\:]/i", "", $ip);
    if (preg_match("/\,/", $tryIP)) {
        $optionalIps = array_filter(explode(",", $tryIP));
        foreach ($optionalIps as $oip) {
            if (filter_var($oip, FILTER_VALIDATE_IP)) {
                return $oip; // Return the first valid IP found
            }
        }
    } else {
        if (filter_var($tryIP, FILTER_VALIDATE_IP)) {
            return $tryIP;
        }
    }
    return false;
}

/**
 * Retrieves the user's IP address, including handling Cloudflare headers.
 */
function getUserIP() {
    // Check for Cloudflare header first
    if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = cleanIP($_SERVER['HTTP_CF_CONNECTING_IP']);
    }
    // Fall back to standard proxy headers
    if (!isset($ip) || empty($ip)) $ip = cleanIP(@$_SERVER['HTTP_X_FORWARDED_FOR']);
    if (!isset($ip) || empty($ip)) $ip = cleanIP(@$_SERVER['HTTP_CLIENT_IP']);
    // Finally, use REMOTE_ADDR as a last resort
    if (!isset($ip) || empty($ip)) $ip = cleanIP($_SERVER['REMOTE_ADDR']);
    
    return $ip;
}


/**
 * Logs messages to a file.
 */
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
