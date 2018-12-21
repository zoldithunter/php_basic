<?php

require("loader.php");

$db = DB::getInstance();

if (input::has('delUser')) {
	
	$data = new Table('user');
	$data->setID('id', input::post('id'));

	$db->delById($data);
}

function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

?>