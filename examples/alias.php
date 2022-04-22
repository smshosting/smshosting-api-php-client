<?php

require '../vendor/autoload.php';

use Rest\Client;
use Rest\ClientException;

//create client
$client = new Client('', '');

//ALIAS
$params = [
    'alias'=>'MioAlias',
    'businessname'=>'Link Mobility Italia',
    'address'=>'Via Prova 1',
    'city'=>'Torino',
    'postcode'=>'10100',
    'province'=>'TO',
    'country'=>'IT',
    'vatnumber'=>'02153481201',
    'email'=>'info@fakeaddress.it',
    'contact'=>'3480000000',
    'taxcode'=>'02153481201',
    'pec'=>'pec@fakeaddress.it'
];

$response = $client->alias->create($params); //CREA
//$response = $client->alias->list(); //LISTA
//$response = $client->alias->delete($idAlias); //ELIMINA

echo 'Status code: '.$response->getCode()."\n";
print_r($response->getContent());
?>