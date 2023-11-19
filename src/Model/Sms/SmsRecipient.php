<?php

namespace MessengerOS\MessengerOS\Model\Sms;

use MessengerOS\MessengerOS\Model\Recipient;

class SmsRecipient extends Recipient implements \JsonSerializable
{
    private string $phoneNumber;

    public function jsonSerialize(): array
    {
        return [
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'distribution_lists' => $this->getDistributionLists(),
            'custom_info' => $this->getCustomInfo(),
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