<?php

class Database{

	protected $client;
	protected $db;

	public function __construct($credentials, $db_name)
	{
		$this->connect($credentials, $db_name);
		$this->client->setTimePrecision('s');

		// Check if Database is already created
		$db_names = $this->getDatabaseNames();
		if (!in_array($db_name, $db_names))
		{
			$db = $this->client->createDatabase($db_name);
			$db->createUser($credentials['user'], $credentials['password']);			
		}

		$this->getDatabase($db_name);
	}

	public function connect($credentials, $db_name)
	{
		$this->client = new \crodas\InfluxPHP\Client(
			$credentials['host'],           // host
			$credentials['port'],           // port
			$credentials['user'],           // user
			$credentials['password']        // password
		);
	}

	public function getDatabaseNames()
	{
		return array_map(create_function('$db', 'return $db->getName();'), $this->client->getDatabases());
	}

	public function getDatabase($db_name)
	{
		$this->db = $this->client->getDatabase($db_name);
	}

	public function query($query)
	{
		return ($this->db->query($query));
	}

	public function insert($table, $object)
	{
		$this->db->insert($table, $object);	
	}	
}
