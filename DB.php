<?php

// using config 
require("config.php");

class DB {
	
	private $_connection;
	private static $_instance;

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


	public static function insertData($obj) {
		$fields = implode(',',array_keys($obj->getData()));
		$listMarks = array_map(function($val) { return '?'; }, array_keys($obj->getData()));
		$marks = implode(',', $listMarks);

		$sql = "INSERT INTO ".$obj->getNameTable()."($fields) VALUES ($marks)";
		echo $sql;
	}

}


?>