<?php

interface Config {
	public function configure();
}

abstract class Connection {

	protected $settings;
	protected $configuration;

	public function setConnection($settings)
	{
		$this->settings = $settings;
	}
}

class MailConfigurator extends Connection implements Config
{

	public function getSender()
	{
		return 'mail sender';
	}

	public function configure()
	{
		$this->configuration = $this->settings['mailer_options'];
		return $this;
	}
}

class DatabaseConfigurator extends Connection implements Config
{

	public function getDriver()
	{
		return 'get some db driver';
	}

	public function configure()
	{
		$this->configuration['dsn'] = $this->settings['dsn'];
		$this->configuration['user'] = $this->settings['user'];
		$this->configuration['password'] = $this->settings['password'];
		return $this;
	}
}

class CacheConfigurator extends Connection implements Config
{

	public function getStorage()
	{
		return 'get some cache storage';
	}

	public function configure()
	{
		$this->configuration['host'] = $this->settings['host'];
		$this->configuration['port'] = $this->settings['poer'];
		$this->configuration['user'] = $this->settings['user'];
		$this->configuration['password'] = $this->settings['password'];
		return $this;
	}
}