<?php

namespace MessengerOS\MessengerOS\Model\Sms;

class SmsRecipient implements \JsonSerializable
{
    private string $phoneNumber;

    public function jsonSerialize(): array
    {
        return [
            'phone_number' => $this->getPhoneNumber()
        ];
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return SmsRecipient
     */
    public function setPhoneNumber(string $phoneNumber): SmsRecipient
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
}