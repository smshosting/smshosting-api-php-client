<?php
require '../vendor/autoload.php';

use Rest\Client;
use Rest\ClientException;

//create client
$client = new Client('', '');

//RESELLER - SUBACCOUNT
$params = [
    'username'=>'luca.bianchi',
    'password'=>'SonoLaPassword!+',
    'name'=>'Luca',
    'lastname'=>'Bianchi',
    'email'=>'lucabianchi@fakeaddress.it'
];

$response = $client->reseller->subaccount->create($params);
//$response = $client->reseller->subaccount->search(['limit'=>1,'query'=>'verdi']); //LISTA SUB ACCOUNT
//$response = $client->reseller->subaccount->delete($idSubAccont); //ELIMINA SUB ACCOUNT
//$response = $client->reseller->subaccount->update($idSubAccont, $params); //AGGIORNA ANAGRAFICA SUB ACCOUNT
//$response = $client->reseller->subaccount->info($idSubAccont); //DETTAGLI ANAGRAFICA SUB ACCOUNT

echo 'Status code: '.$response->getCode()."\n";
print_r($response->getContent());
?>