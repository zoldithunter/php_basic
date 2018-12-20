<?php

require("loader.php");

$db = DB::getInstance();

$datas = $db->table('user')->getAll();

foreach ($datas as $data) {
	echo '1';
}

?>