<?php

// Uncomment the next line if you're using a dependency loader (such as Composer) (recommended)
// require 'vendor/autoload.php';

// Uncomment the next line if you're not using a dependency loader (such as Composer),
// replacing <PATH TO> with the path to the messengeros-loader.php file
// require_once __DIR__ . '/../../messengeros-loader.php';

use MessengerOS\MessengerOS\Model\Email;
use MessengerOS\MessengerOS\Model\Sms;
use MessengerOS\MessengerOS\Service\ApiService;

$messengerOsEmailDeliveryProviderKey = getenv('MESSENGER_OS_EMAIL_DELIVERY_PROVIDER_KEY');
$messengerOsSmsDeliveryProviderKey = getenv('MESSENGER_OS_SMS_DELIVERY_PROVIDER_KEY');
$messengerOsUserKey = getenv('MESSENGER_OS_USER_KEY');
$messengerOsProjectKey = getenv('MESSENGER_OS_PROJECT_KEY');

$apiService = new ApiService(
    $messengerOsUserKey,
    $messengerOsProjectKey
);

/* Build email recipients list */
$emailRecipients[] = (new Email\EmailRecipient())
    ->setEmail("recipient1@example.com");
$emailRecipients[] = (new Email\EmailRecipient())
    ->setEmail("recipient2@example.com");

/* Build SMS recipients list */
$smsRecipients[] = (new Sms\SmsRecipient())
    ->setPhoneNumber("07xxxxxxx1");
$smsRecipients[] = (new Sms\SmsRecipient())
    ->setPhoneNumber("07xxxxxxx2");

// if we have to send 2 emails with different details we just build the Email objects for each of them
// and add them to the $emails array

$email = new Email\Email();
$email
    ->setFromName("John | My Company")
    ->setFromEmail("john@mycompany.com")
    ->setRecipients($emailRecipients)
    ->setSubject("My subject line from API")
    ->setPreviewLine("My preview line from API")
    ->setDeliveryProvider($messengerOsEmailDeliveryProviderKey)
    ->setTemplate("_OPTIONAL_TEMPLATE_API_KEY_FROM_PLATFORM")
    ->setReplyTo("no-reply@mycompany.com")
    ->setBody("<p>My HTML Content</p>")
    ->setParams([
        ['first_name' => 'Thomas'],
        ['last_name' => 'Smith']
    ]);

$emails[] = $email;

// if we have to send 2 SMSes with different details we just build the Sms objects for each of them
// and add them to the $SMSes array
$sms = new Sms\Sms();
$sms
    ->setRecipients($smsRecipients)
    ->setDeliveryProvider($messengerOsSmsDeliveryProviderKey)
    ->setSmsBody("My text content")
    ->setTemplate("_OPTIONAL_TEMPLATE_API_KEY_FROM_PLATFORM")
    ->setParams([
        ['first_name' => 'Thomas'],
        ['last_name' => 'Smith']
    ]);

$SMSes[] = $sms;

// Send mixed notifications with Emails and Smses at once //
try {
    $response = $apiService->sendNotifications($emails, $SMSes);
    print $response . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// Send only Email notifications //
try {
    $response = $apiService->sendEmails($emails);
    print $response . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}


// Send only SMS notifications //
try {
    $response = $apiService->sendSMSes($SMSes);
    print $response . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}