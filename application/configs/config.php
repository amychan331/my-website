<?php
	// Error report if the codes are being run in localhost environment
	if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1'||'::1') {
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
	}

	// Autoloader for class inside application directory
	spl_autoload_register(function ($class_name) {
		$dirs = array(
			'application/controllers/',
			'application/models/',
			'application/views/',
		);

		foreach($dirs as $dir) {
	    	if (file_exists($dir . $class_name . '.php')) {
	    		require_once($dir . $class_name . '.php');
	    		return;
	    	}
		}
	});