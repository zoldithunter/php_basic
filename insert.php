<?php

require("loader.php");

$db = DB::getInstance();

if (input::has('addUser')) {

	$data = new Object('user');
	$data->__set('username',input::post('username'));
	$data->__set('password',input::post('password'));
	$data->__set('fullname',input::post('fullname'));
	$data->__set('phone',input::post('phone'));
	$data->__set('email',input::post('email'));

	$db->insertData($data);
}

?>