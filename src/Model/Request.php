<?php

namespace MessengerOS\MessengerOS\Model;

class Request implements \JsonSerializable
{
    /* The User API KEY from MessengerOS -> My Account */
    private string $user;

    /* The Project API Key from Settings -> Projects -> Current Project */
    private string $project;

    /* The Notification object that will contain all the emails and SMSes objects that will be sent */
    private Notification $notification;

    public function jsonSerialize(): array
    {
        return [
            'user' => $this->getUser(),
            'project' => $this->getProject(),
            'notification' => $this->getNotification()
        ];
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return Request
     */
    public function setUser(string $user): Request
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getProject(): string
    {
        return $this->project;
    }

    /**
     * @param string $project
     * @return Request
     */
    public function setProject(string $project): Request
    {
        $this->project = $project;
        return $this;
    }

    /**
     * @return Notification
     */
    public function getNotification(): Notification
    {
        return $this->notification;
    }

    /**
     * @param Notification $notification
     * @return Request
     */
    public function setNotification(Notification $notification): Request
    {
        $this->notification = $notification;
        return $this;
    }
}