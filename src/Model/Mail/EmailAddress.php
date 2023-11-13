<?php

namespace MessengerOS\MessengerOS\Model\Mail;

class EmailAddress
{
    /** @var $email string The email address */
    private string $email;

    /** @var $subject string The subject */
    private string $subject;

    /**
     * Optional constructor
     *
     * @param string|null $email    The email address
     * @param string|null $name     The name of the person associated with the email
     * @param string|null $subject  The personalized subject of the email
     */
    public function __construct(
        $email = null,
        $name = null,
        $subject = null
    ) {
        if (!empty($email)) {
            $this->setEmail($email);
        }
        if (!empty($subject)) {
            $this->setSubject($subject);
        }
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }
}