<?php

namespace MessengerOS\MessengerOS\Model\Email;

class EmailRecipient implements \JsonSerializable
{
    private ?string $email = null;

    private ?string $sameContactAsPhoneNumber = null;

    public function jsonSerialize(): array
    {
        return [
            'email' => $this->getEmail(),
            'same_contact_as_phone_number' => $this->getSameContactAsPhoneNumber()
        ];
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return EmailRecipient
     */
    public function setEmail(?string $email): EmailRecipient
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSameContactAsPhoneNumber(): ?string
    {
        return $this->sameContactAsPhoneNumber;
    }

    /**
     * @param string|null $sameContactAsPhoneNumber
     * @return EmailRecipient
     */
    public function setSameContactAsPhoneNumber(?string $sameContactAsPhoneNumber): EmailRecipient
    {
        $this->sameContactAsPhoneNumber = $sameContactAsPhoneNumber;
        return $this;
    }
}