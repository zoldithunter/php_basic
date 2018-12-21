<?php

$files = [
	'object',
	'input',
	'DB',
];

foreach ($files as $file) {
	require($file.'.php');
}

?>