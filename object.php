<?php

class Object {

	private $_nameTable;
	private $_data= array();

	public function __construct($nameTable) {
		$this->_nameTable = $nameTable;
	}

	public function __set($var,$val){
    	$this->_data[$var] = $val;
  	}

  	public function __get($var){
  		if (isset($this->_results[$var])){
  			return $this->_results[$var];
  		} else {
  			return null;
  		}
  	}

  	public function getNameTable() {
  		return $this->_nameTable;
  	}

  	public function getData() {
  		return $this->_data;
  	}
}


?>