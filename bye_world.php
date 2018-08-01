<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require 'vendor/autoload.php';
$signedRequest = new \Speakap\SDK\SignedRequest('bla', 'bla');
echo 'Bla';
if (!$validator->validateSignature($_POST)) {
    die('Invalid signature');
}
