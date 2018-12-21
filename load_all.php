<?php

require("loader.php");

$db = DB::getInstance();

$datas = $db->table('user')->getAll();

if (is_ajax()) {
	$rows = array();
	while ($data = mysqli_fetch_assoc($datas)) {
		$rows[] = $data;
	}
	echo json_encode($rows);
} else {
	while($data = $datas->fetch_array()) {
		print_r($data);
		echo '<br/>';
	}
}

function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
?>
