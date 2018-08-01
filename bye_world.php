<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'vendor/autoload.php';

$signedRequest = new \Speakap\SDK\SignedRequest('2901771f37000d34', 'af37fd105d5f047a1d4e60c6492991b5f6d526de51efdbc9efe927aa0665d7ba');


if (!$signedRequest->validateSignature($_POST)) {
    die('Invalid signature');
}

echo 'Bye world ...';
