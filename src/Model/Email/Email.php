<?php

namespace MessengerOS\MessengerOS\Model\Email;

class Email implements \JsonSerializable
{
    /** @var EmailRecipient[]  */
    private array $recipients = [];

    private string $deliveryProvider;

    private ?string $fromEmail = null;

    private ?string $replyTo = null;

    private ?string $template = null;

    private ?string $fromName = null;

    private ?string $subject = null;

    private ?string $previewLine = null;

    private ?string $body = null;

    private ?array $params = [[]];

    public function jsonSerialize(): array
    {
        return [
            'recipients' => $this->getRecipients(),
            'delivery_provider' => $this->getDeliveryProvider(),
            'from_email' => $this->getFromEmail(),
            'reply_to' => $this->getReplyTo(),
            'template' => $this->getTemplate(),
            'from_name' => $this->getFromName(),
            'subject' => $this->getSubject(),
            'preview_line' => $this->getPreviewLine(),
            'body' => $this->getBody(),
            'params' => $this->getParams()
        ];
    }

    /**
     * @return EmailRecipient[]
     */
    public function getRecipients(): array
    {
        return $this->recipients;
    }

    /**
     * @param EmailRecipient[] $recipients
     * @return Email
     */
    public function setRecipients(array $recipients): Email
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
     * @return Email
     */
    public function setDeliveryProvider(string $deliveryProvider): Email
    {
        $this->deliveryProvider = $deliveryProvider;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFromEmail(): ?string
    {
        return $this->fromEmail;
    }

    /**
     * @param string|null $fromEmail
     * @return Email
     */
    public function setFromEmail(?string $fromEmail): Email
    {
        $this->fromEmail = $fromEmail;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReplyTo(): ?string
    {
        return $this->replyTo;
    }

    /**
     * @param string|null $replyTo
     * @return Email
     */
    public function setReplyTo(?string $replyTo): Email
    {
        $this->replyTo = $replyTo;
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
     * @return Email
     */
    public function setTemplate(?string $template): Email
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFromName(): ?string
    {
        return $this->fromName;
    }

    /**
     * @param string|null $fromName
     * @return Email
     */
    public function setFromName(?string $fromName): Email
    {
        $this->fromName = $fromName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string|null $subject
     * @return Email
     */
    public function setSubject(?string $subject): Email
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPreviewLine(): ?string
    {
        return $this->previewLine;
    }

    /**
     * @param string|null $previewLine
     * @return Email
     */
    public function setPreviewLine(?string $previewLine): Email
    {
        $this->previewLine = $previewLine;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param string|null $body
     * @return Email
     */
    public function setBody(?string $body): Email
    {
        $this->body = $body;
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
     * @return Email
     */
    public function setParams(?array $params): Email
    {
        $this->params = $params;
        return $this;
    }
}