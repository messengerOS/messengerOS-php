<?php

namespace MessengerOS\MessengerOS\Model\Sms;

class Sms implements \JsonSerializable
{
    /** @var SmsRecipient[]  */
    private array $recipients = [];

    private string $deliveryProvider;

    private ?string $smsBody = null;

    private ?string $template = null;

    private ?array $params = [];

    public function jsonSerialize(): array
    {
        return [
            'recipients' => $this->getRecipients(),
            'delivery_provider' => $this->getDeliveryProvider(),
            'sms_body' => $this->getSmsBody(),
            'template' => $this->getTemplate(),
            'params' => $this->getParams()
        ];
    }

    /**
     * @return SmsRecipient[]
     */
    public function getRecipients(): array
    {
        return $this->recipients;
    }

    /**
     * @param SmsRecipient[] $recipients
     * @return Sms
     */
    public function setRecipients(array $recipients): Sms
    {
        $this->recipients = $recipients;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryProvider(): string
    {
        return $this->deliveryProvider;
    }

    /**
     * @param string $deliveryProvider
     * @return Sms
     */
    public function setDeliveryProvider(string $deliveryProvider): Sms
    {
        $this->deliveryProvider = $deliveryProvider;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSmsBody(): ?string
    {
        return $this->smsBody;
    }

    /**
     * @param string|null $smsBody
     * @return Sms
     */
    public function setSmsBody(?string $smsBody): Sms
    {
        $this->smsBody = $smsBody;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTemplate(): ?string
    {
        return $this->template;
    }

    /**
     * @param string|null $template
     * @return Sms
     */
    public function setTemplate(?string $template): Sms
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getParams(): ?array
    {
        return $this->params;
    }

    /**
     * @param array|null $params
     * @return Sms
     */
    public function setParams(?array $params): Sms
    {
        $this->params = $params;
        return $this;
    }
}