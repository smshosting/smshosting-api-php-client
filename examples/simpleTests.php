<?php

require '../vendor/autoload.php';
//create client
$client = new SmsHosting\SmsHostingClient('', '');

echo "# loading user\n";
//load user
$user = $client->getUser();
//print user
echo "# loaded User: " . $user->raw_body . "\n\n";
