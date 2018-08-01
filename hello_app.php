<?php

error_reporting(E_ALL);
init_set("display_errors", 1);

require __DIR__ . 'vendor/autoload.php';

use Speakap\SDK as SpeakapSDK;

$signedRequest = new SpeakapSDK\SignedRequest('2900fd4ddb000f04', 'b10cbcc2d6ffda09b59a7a3595c448f1855b1b83f0b09c30724ebb2254cd067d');

if (!$signedRequest->validateSignature($_POST)) {
    die('Invalid signature');
}

echo 'Hello world :)'
