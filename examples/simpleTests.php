<?php

require '../vendor/autoload.php';
//create client
$client = new SmsHosting\SmsHostingClient('SMSH2WTG4E7BVAI6TF1YX', '5JZ7H16W18LJV0EV5887WKWYUR8ROS1E');

echo "# loading user\n";
//load user
$user = $client->getUser();
//print user
echo "# loaded User: " . $user->raw_body . "\n\n";



usleep(500);

echo "# sending sms\n";
//send sms
$sendResponse = $client->sendSms(array(
    'to' => '393480000000',
    'text' => 'test',
    'sandbox' => 'true'
));

//print user
echo "# sms sended: " . $sendResponse->raw_body . "\n\n";
