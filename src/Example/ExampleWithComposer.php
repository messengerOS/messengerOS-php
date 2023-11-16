<?php

// Uncomment the next line if you're using a dependency loader (such as Composer) (recommended)
// require 'vendor/autoload.php';

use MessengerOS\MessengerOS\Model\Request;
use MessengerOS\MessengerOS\Model\Email;
use MessengerOS\MessengerOS\Model\Notification;
use MessengerOS\MessengerOS\Service\ApiService;

$messengerOsDeliveryProviderKey = getenv('MESSENGER_OS_DELIVERY_PROVIDER_KEY');
$messengerOsUserKey = getenv('MESSENGER_OS_USER_KEY');
$messengerOsProjectKey = getenv('MESSENGER_OS_PROJECT_KEY');
$messengerOsApiUrl = getenv('MESSENGER_OS_API_URL');

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

    print $response . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}