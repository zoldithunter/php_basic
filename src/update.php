<?php

require("loader.php");

$db = DB::getInstance();

if (input::has('updateUser')) {
	
	$data = new Table('user');
	$data->__set('username',input::post('username'));
	$data->__set('password',input::post('password'));
	$data->__set('fullname',input::post('fullname'));
	$data->__set('phone',input::post('phone'));
	$data->__set('email',input::post('email'));
	date_default_timezone_set('Asia/Kuala_Lumpur');
	$data->__set('date',date('Y-m-d H:i:s', time()));
	$data->setID('id', input::post('id'));

	$db->updateById($data);
}

?>