<?php

error_reporting(E_ALL);
init_set("display_errors", 1);

include 'vendor/autoload.php';

use Speakap\SDK as SpeakapSDK;

$signedRequest = new SpeakapSDK\SignedRequest('appID', 'Secret');

echo 'Hello world :)'

if (!$validator->validateSignature($_POST)) {
    die('Invalid signature');
}
