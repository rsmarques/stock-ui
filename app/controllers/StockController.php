<?php

class StockController extends BaseController {

	protected $db;
	protected $table_name;

	public function __construct()
	{
		$credentials        = $_SESSION['influxdb'];
		$db_name            = $_SESSION['db_name'];
		$this->table_name   = $_SESSION['table_name'];
		$this->db           = new Database($credentials, $db_name);
	}

	public function createIndex()
	{
		return View::make('create');
	}

	public function create()
	{
		$value     = Input::get('value');
		$time      = Input::get('time');
		$timestamp = strtotime($time, 0);

		$stock_entry = ['time' => $timestamp, 'value' => $value];
		$this->db->insert($this->table_name, $stock_entry);

		return View::make('create_message')->with('stock_entry', ['time' => $time, 'value' => $value]);
	}

	public function chartIndex()
	{
		return View::make('chart');
	}

	public function chart()
	{
		$results = $this->db->query("select * from ". $this->table_name ." order asc;");

		$timespan       = Input::get('timespan') * 60;
		$timestamps     = range(0, 24*60*60, $timespan); //Array of timeframes according to the received timespan
		$stock_entrys   = array();
		$value = $index = 0;

		foreach($timestamps as $timestamp)
		{
			// Getting the last value in the current timeframe
			while ($index < count($results) && $results[$index]->time <= $timestamp ) {
				$value = $results[$index]->value;
				$index++;
			}
			$stock_entrys[] = ["time" => date("H:i", $timestamp), "value" => $value];
		}

		return View::make('chart_points')->with('results', $stock_entrys);
	}

}
