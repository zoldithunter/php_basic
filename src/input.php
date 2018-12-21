<?php

class input {

	public static function post($name) {
		return ( $_POST[$name] ? $_POST[$name] : null );
	}

	public static function has($name) {
		return isset( $_POST[$name] );
	}
}


?>