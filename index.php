<?php

require("object.php");
require("DB.php");

$db = DB::getInstance();

$data = new Object('user');
$data->__set('username','ithunter');
$data->__set('password','duy');
$data->__set('fullname','Duy dai ca');
$data->__set('phone','0357996532');
$data->__set('email','zold.ithunter@gmail.com');

$db->insertData($data);

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP - BASIC</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="POST" action="index.php">
		<input type="text" name="username" placeholder="Username" />
		<input type="password" name="password" placeholder="Password" />
		<input type="password" name="repassword" placeholder="Repeat Password" />
		<input type="text" name="fullname" placeholder="Full Name" />
		<input type="text" name="phone" placeholder="Phone" />
		<input type="text" name="email" placeholder="Email" />
		<input id="btn-signup" type="submit" name="addUser" value="Register" />
	</form>
</body>
</html>