<?php

require("loader.php");

$db = DB::getInstance();

if (input::has('addUser')) {
	
	$data = new Table('user');
	$data->__set('username',input::post('username'));
	$data->__set('password',input::post('password'));
	$data->__set('fullname',input::post('fullname'));
	$data->__set('phone',input::post('phone'));
	$data->__set('email',input::post('email'));

	$db->insertData($data);
}

function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

?>
