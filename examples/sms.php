<?php
require '../vendor/autoload.php';

use Rest\Client;
use Rest\ClientException;

//create client
$client = new Client('', '');
//SMS
$params = [
    'to'=>'393400000000',
    'text'=>'sms di test',
    'from'=>'DemoSMS',
    'sandbox' => 'true',
    'statusCallback'=>'https://mydomain.com/dlr.php'
];

$response = $client->sms->send($params); //INVIA SMS
//$response = $client->sms->sendbulk($params); //INVIA SMS BULK

echo 'Status code: '.$response->getCode()."\n";
print_r($response->getContent());
?>