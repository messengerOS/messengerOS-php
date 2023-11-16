<?php

// Uncomment the next line if you're using a dependency loader (such as Composer) (recommended)
// require 'vendor/autoload.php';

// Uncomment the next line if you're not using a dependency loader (such as Composer), replacing <PATH TO> with the path to the sendgrid-php.php file
// require_once '<PATH TO>/sendgrid-php.php';

require_once __DIR__ . '/../../messengeros-loader.php';
require_once __DIR__ . '/../../config.php';

use MessengerOS\MessengerOS\Model\Request;
use MessengerOS\MessengerOS\Model\Email;
use MessengerOS\MessengerOS\Model\Notification;
use \MessengerOS\MessengerOS\Service\ApiService;

// START API KEYS - these variables can be moved to a config file //

$MESSENGER_OS_USER_KEY="";
$MESSENGER_OS_PROJECT_KEY="";
$MESSENGER_OS_DELIVERY_PROVIDER_KEY="";
$MESSENGER_OS_API_URL="https://inbound.messengeros.com/1.0/send";

// END API KEYS - these variables can be moved to a config file //

$messengerOsDeliveryProviderKey = $MESSENGER_OS_DELIVERY_PROVIDER_KEY;
$messengerOsUserKey = $MESSENGER_OS_USER_KEY;
$messengerOsProjectKey = $MESSENGER_OS_PROJECT_KEY;
$messengerOsApiUrl = $MESSENGER_OS_API_URL;

$messengerOSRequest = new Request();


$recipients[] = (new Email\EmailRecipient())->setEmail("recipient1@example.com");
$recipients[] = (new Email\EmailRecipient())->setEmail("recipient2@example.com");

$email = new Email\Email();
$email
    ->setFromName("John | My Company")
    ->setFromEmail("john@mycompany.com")
    ->setRecipients($recipients)
    ->setSubject("My subject line from API")
    ->setPreviewLine("My preview line from API")
    ->setDeliveryProvider($messengerOsDeliveryProviderKey)
    ->setReplyTo("no-reply@mycompany.com")
    ->setBody("<p>My HTML Content</p>")
    ->setParams([['first_name' => 'Maurice']]);

$emails[] = $email;

$notification = (new Notification())
    ->setEmail($emails);

$messengerOSRequest
    ->setUser($messengerOsUserKey)
    ->setProject($messengerOsProjectKey)
    ->setNotification($notification);

$apiService = new ApiService();

try {
    $response = $apiService->send($messengerOsApiUrl, json_encode($messengerOSRequest));

    print $response['status'] . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}