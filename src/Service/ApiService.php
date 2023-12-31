<?php

namespace MessengerOS\MessengerOS\Service;

use MessengerOS\MessengerOS\Model\Notification;
use MessengerOS\MessengerOS\Model\Request;

class ApiService
{
    private string $messengerOsUserKey;

    private string $messengerOsProjectKey;

    private string $messengerOsSendUrl;

    public function __construct(
        $messengerOsUserKey,
        $messengerOsProjectKey,
        $messengerOsSendUrl
    ) {
        $this->messengerOsUserKey = $messengerOsUserKey;
        $this->messengerOsProjectKey = $messengerOsProjectKey;
        $this->messengerOsSendUrl = $messengerOsSendUrl;
    }

    public function sendNotifications(array $emails, array $SMSes)
    {
        $notification = (new Notification())
            ->setEmail($emails)
            ->setSms($SMSes);
        return $this->sendNotification($notification);
    }

    public function sendSMSes(array $SMSes)
    {
        $notification = (new Notification())
            ->setSms($SMSes);
        return $this->sendNotification($notification);
    }


    public function sendEmails(array $emails)
    {
        $notification = (new Notification())
            ->setEmail($emails);
        return $this->sendNotification($notification);
    }

    public function sendNotification($notification)
    {
        $messengerOSRequest = new Request();
        $messengerOSRequest
            ->setUser($this->messengerOsUserKey)
            ->setProject($this->messengerOsProjectKey)
            ->setNotification($notification);

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $this->messengerOsSendUrl,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($messengerOSRequest),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_SSL_VERIFYPEER => false
        ));

        $result = curl_exec ($ch);
        curl_close ($ch);

        return json_decode($result, true);
    }
}