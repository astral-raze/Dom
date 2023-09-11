<?php
$expectedUserAgent = 'more_niggers';

$authorizationHeader = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : '';
$token = str_replace('Bearer ', '', $authorizationHeader);

if (isset($_SERVER['HTTP_USER_AGENT']) && $_SERVER['HTTP_USER_AGENT'] == $expectedUserAgent && $token !== '') {
    $decodedTime = decodeToken($token);

    if ($decodedTime !== false) {
        $currentTime = time();
        $decodedTimeUnix = strtotime($decodedTime);
        $allowedDeviation = 10;

        if (abs($decodedTimeUnix - $currentTime) <= $allowedDeviation) {
            $msg = file_get_contents('hackmeplsxd.txt');
            echo $msg;
        } else {
            echo 'over time';
        }
    } else {
        echo 'invalid token';
    }
} else {
    echo 'invalid client';
}

function decodeToken($token) {
    $decodedTime = "";
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

    for ($i = 0; $i < strlen($token); $i += 2) {
        $encodedChar = substr($token, $i, 1);
        $char = substr($token, $i + 1, 1);
        $charIndex = strpos($characters, $encodedChar);

        if ($charIndex === false) {
            return false;
        }

        $decodedTime .= $char;
    }

    return $decodedTime;
}
?>
