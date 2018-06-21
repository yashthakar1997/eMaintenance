<?php

require_once "vendor/autoload.php";

$basic  = new \Nexmo\Client\Credentials\Basic('dad3af06', '8b76743e8cc63599');
$client = new \Nexmo\Client($basic);
$test = "New Complain regestered";

$message = $client->message()->send([
    'to' => 919099163316,
    'from' => 'Yash Thakar',
    'text' => $test
]);