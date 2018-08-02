<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'vendor/autoload.php';

// Make a signed request
$signedRequest = new \Speakap\SDK\SignedRequest('290268537a00047c ', '1316056a7fb99da3443d1a32aab351fb2338bd6aa8a683ef71dcdcc53fccb85d');


if (!$signedRequest->validateSignature($_POST)) {
    die('Invalid signature');
}

$encSignedReq = $signedRequest->getSignedRequest($_POST);

$signedParams = $signedRequest->getSignedParameters($_POST);

$baseUrl = 'https://api.test.speakap.nl/networks/' . $signedParams['networkEID'];


$accessToken = '290268537a00047c_1316056a7fb99da3443d1a32aab351fb2338bd6aa8a683ef71dcdcc53fccb85d';

function getUser($userEID) {
    global $baseUrl;
    global $accessToken;

    // Get current user details
    $chCurrentUser = curl_init("$baseUrl/users/{$userEID}/");

    curl_setopt_array($chCurrentUser, array(
        CURLOPT_HEADER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            'Accept: application/vnd.speakap.api-v1.4+json',
            'Authorization: Bearer ' . $accessToken
        )
    ));

    $response = curl_exec($chCurrentUser);
    curl_close($chCurrentUser);

    $chCurrentUser = json_decode($response);

    return $chCurrentUser;

}

function getAllUsers() {
    global $baseUrl;
    global $accessToken;

    // Get all users in network
    $chUsers = curl_init("$baseUrl/users/");

    curl_setopt_array($chUsers, array(
        CURLOPT_HEADER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            'Accept: application/vnd.speakap.api-v1.4+json',
            'Authorization: Bearer ' . $accessToken
        )
    ));

    $response = curl_exec($chUsers);
    curl_close($chUsers);

    $users = json_decode($response);

    // Return array with all users
    return $users->users;
}

// Get current in user
$chCurrentUser = getUser($signedParams['userEID']);

// Welcome current user
echo "<img style=\"-webkit-user-select:none; display:block; margin:auto;\" src=\"{$chCurrentUser->avatarThumbnailUrl}\">";
echo "<p style=\"text-align:center;\">Hello {$chCurrentUser->fullName} !</p>";
echo "<p>All users in network!</p>";




$usersArr = getAllUsers();

foreach ($usersArr as $someUser) {
    // var_dump($someUser);
    echo "<p>Hello {$someUser->EID} !</p>";
};
//
// var_dump($users->users[0]->EID);
// // $userEID = $user->users[0]->EID
// // echo "<p>Hello {$user->fullName}!</p>";
//
// echo "<p>Hello {$users->users[0]->EID} !</p>";
