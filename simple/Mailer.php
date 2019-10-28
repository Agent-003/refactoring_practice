<?php

class Mailer
{
	public $mailer;
	public $mail;

	public function setMailer(GoogleMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	public function compose($to, $from, $body, $subject)
	{
		$this->mail = [
			'to' => $to,
			'from' => $from,
			'body' => $body,
			'subject' => $subject
		];
	}

	public function send()
	{
		if (!empty($this->mail)) {
			return sprintf('Mail was sent to %s from %s with subject %s and message %s',
								$this->mail['to'], $this->mail['from'], $this->mail['subject'],
								$this->mail['body']);
		} else {
			throw new Exception('Mail was not composed');
		}
	}
}

class GoogleMailer
{
	public $settings = [];

	public function googleMailer($settings = null)
	{
		if ($settings) {
			$this->settings['host'] = $settings['host'];
			$this->settings['user'] = $settings['user'];
			$this->settings['password'] = $settings['password'];
		}
	}

	public function setHost($host)
	{
		$this->settings['host'] = $host;
	}

	function setUser(String $user) {
		$this->settings['user'] = $user;
	}

	public function setPassword($password)
	{
		$this->settings['password'] = $password;
	}
}

$googleMailer = new GoogleMailer(['host' => 'smtp.google.com',
								  'user' => 'test',
								  'password' => 'testpass']);
$mailer = new Mailer();
$mailer->setMailer($googleMailer);
$mailer->compose('test@mail.com', 'student@mail.com', 'Welcome', 'Welcome message');
echo $mailer->Send();