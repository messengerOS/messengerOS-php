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
$messengerOsSendUrl = getenv('MESSENGER_OS_SEND_URL');

$apiService = new ApiService(
    $messengerOsUserKey,
    $messengerOsProjectKey,
    $messengerOsSendUrl
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
    ->setReplyTo("no-reply@mycompany.com")
    ->setParams([
        ['first_name' => 'Thomas'],
        ['last_name' => 'Smith']
    ]);

/* if the email template is build in the originating platform */
$email
    ->setBody("<p>Howdy, [first_name]!</p>");

/* if the email template is build in MessengeOS UI use the template API KEY// */
$email
    ->setTemplate("_OPTIONAL_TEMPLATE_API_KEY_FROM_PLATFORM_");


$emails[] = $email;

$path = "<path-to-local-file-to-be attached>";
$attachment = (new Email\Attachment())
    ->setFileName(basename($path))
    ->setFile(base64_encode(file_get_contents($path)));

$attachments[] = $attachment;

$email
    ->setAttachments($attachments);


// if we have to send 2 SMSes with different details we just build the Sms objects for each of them
// and add them to the $SMSes array
$sms = new Sms\Sms();
$sms
    ->setRecipients($smsRecipients)
    ->setDeliveryProvider($messengerOsSmsDeliveryProviderKey)
    ->setParams([
        ['first_name' => 'Thomas'],
        ['last_name' => 'Smith']
    ]);

/* if the SMS template is build in the originating platform */
$sms
    ->setSmsBody("<p>Howdy, [first_name] [last_name]!</p>");

/* if the SMS template is build in MessengeOS UI use the template API KEY// */
$sms
    ->setTemplate("_OPTIONAL_TEMPLATE_API_KEY_FROM_PLATFORM_");

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