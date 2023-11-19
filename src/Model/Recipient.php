<?php

namespace MessengerOS\MessengerOS\Model;

class Recipient
{
    protected ?string $name = null;

    protected ?string $firstName = null;

    protected ?string $lastName = null;

    protected ?array $distributionLists = [];

    protected ?array $customInfo = [];

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Recipient
     */
    public function setName(?string $name): Recipient
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getDistributionLists(): ?array
    {
        return $this->distributionLists;
    }

    /**
     * @param array|null $distributionLists
     * @return Recipient
     */
    public function setDistributionLists(?array $distributionLists): Recipient
    {
        $this->distributionLists = $distributionLists;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getCustomInfo(): ?array
    {
        return $this->customInfo;
    }

    /**
     * @param array|null $customInfo
     * @return Recipient
     */
    public function setCustomInfo(?array $customInfo): Recipient
    {
        $this->customInfo = $customInfo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     * @return Recipient
     */
    public function setFirstName(?string $firstName): Recipient
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     * @return Recipient
     */
    public function setLastName(?string $lastName): Recipient
    {
        $this->lastName = $lastName;
        return $this;
    }
}