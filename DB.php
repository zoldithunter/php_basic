<?php

// using config 
require("config.php");

class DB {
	
	private $_connection = null;
	private static $_instance = null;

	private $_table = null;

	/**
	Private Contructor
	**/

	private function __construct() {
		try {
			$this->_connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);
	
			// Error handling
			if($this->_connection->connect_error) {
				echo "Failed to connect to MySQL ! ";
			}
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

	/**
	Private Close connection
	**/
	function __destruct() {
		$this->_connection->close();
	}

	/**
	Get an instance of the Database
	@return Instance
	**/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public static function closeConnection() {
		self::$_instance->__destruct();
	}

	public function table($tableName) {
		$this->_table = $tableName;
		return $this;
	}


	public function insertData($obj) {
		$fields = implode(',',array_keys($obj->getData()));
		$listMarks = array_map(function($val) { return '?'; }, array_keys($obj->getData()));
		$marks = implode(',', $listMarks);
		$type = str_repeat('s', count($obj->getData()));
		$values = array_values($obj->getData());

		$sql = "INSERT INTO ".$obj->getNameTable()."($fields) VALUES ($marks)";
		$stmt = $this->_connection->prepare($sql);
		$stmt->bind_param($type, ...$values);
		$stmt->execute();
		echo 'Thanh cong';
	}

	public function getAll() {
		$sql = "SELECT * FROM ".$this->_table;
		$subject=mysqli_query($this->_connection,$sql);
		$i=-1;

		while($row = mysqli_fetch_array($subject))
		{
			$i++;
			print_r($row);
			echo '<br/>';

		}
	}

}


?>