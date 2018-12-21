<?php

class Table {

	private $_nameTable;
	private $_data   = array();
  private $_idKey  = null;
  private $_idData = null;

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

    public function setID($key, $data) {
      $this->_idKey   = $key;
      $this->_idData  = $data;
    }

    public function getIDKey() {
      return $this->_idKey;
    }

    public function getIDData() {
      return $this->_idData;
    }
}


?>
