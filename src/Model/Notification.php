<?php

namespace MessengerOS\MessengerOS\Model;

use MessengerOS\MessengerOS\Model\Email\Email;
use MessengerOS\MessengerOS\Model\Sms\Sms;

class Notification implements \JsonSerializable
{
    /** @var Email[] An array of Email objects that contain email information */
    private array $email = [];

    /** @var Sms[] An array of SMS objects that contain SMS information */
    private array $sms = [];

    public function jsonSerialize(): array
    {
        return [
            'email' => $this->getEmail(),
            'sms' => $this->getSms()
        ];
    }

    /**
     * @return Email[]
     */
    public function getEmail(): array
    {
        return $this->email;
    }

    /**
     * @param Email[] $email
     * @return Notification
     */
    public function setEmail(array $email): Notification
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return Sms[]
     */
    public function getSms(): array
    {
        return $this->sms;
    }

    /**
     * @param Sms[] $sms
     * @return Notification
     */
    public function setSms(array $sms): Notification
    {
        $this->sms = $sms;
        return $this;
    }
}