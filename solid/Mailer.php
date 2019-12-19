<?php

// Hint - Dependency Inversion Principle
// Принцип инверсии зависимостей

interface Mailer
{
    public function send();
    public function getWelcomeMessage();
}

class SendWelcomeMessage
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendWelcome()
    {
       return $this->mailer->getWelcomeMessage();
    }
}

class Goolge implements Mailer
{

    public $welcomeMessage="Welcome from Goolge";
    public $message;
    public $settings = ['host' => 'smtp.google.com',
                        'user' => 'Google',
                        'password' => 'googlepass'];

    public function send()
    {
        return $this->message;
    }

    public function getWelcomeMessage()
    {
        return "Welcome from ".$this->settings['user'];
    }
}

class Sendgrid implements Mailer
{

    public $welcomeMessage="Welcome from Sendgrid";
    public $message;
    public $settings = ['host' => 'smtp.sendgrid.com',
                        'user' => 'Sendgrid',
                        'password' => 'sendgridpass'];

    public function send()
    {
        return $this->message;
    }

    public function getWelcomeMessage()
    {
        return "Welcome from ".$this->settings['user'];
    }
}

class Mailchimp implements Mailer
{
    public $welcome="Welcome send from Mailchimp";
    public $message;
    public $settings = ['host' => 'smtp.mailchimp.com',
                        'user' => 'Mailchimp',
                        'password' => 'mailchimppass'];

    public function send()
    {
        return $this->message;
    }

    public function getWelcomeMessage()
    {
        return "Welcome from ".$this->settings['user'];
    }
}

$SendWelcomeGoolge=new Goolge;
$SendWelcomeSendgrid=new Sendgrid;
$SendWelcomeMailchimp=new Mailchimp;
$send=New SendWelcomeMessage($SendWelcomeGoolge);
echo $send->sendWelcome();
$send=New SendWelcomeMessage($SendWelcomeSendgrid);
echo $send->sendWelcome();
$send=New SendWelcomeMessage($SendWelcomeMailchimp);
echo $send->sendWelcome();