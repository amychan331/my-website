<?php
	/** index.php
	*   Index page of CraftPlusTech
	*   @author Amy Yuen Ying Chan
	*   @copyright 2017 Amy Yuen Ying Chan
	*   @link: http://craftplustech.com
	**/

	require_once('application/configs/config.php');
	require_once('application/views/Header.php');

	# Find the page name that corresponds with the url
	$url = $_SERVER['REQUEST_URI'];
	if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1'||'::1') {
		$url = str_replace("/personalProject-portfolioWebsite", "", $url);
	}
	$parameters = explode('/', trim($url, '/'));

	# Extract the parameter if additional queries exist.
	if(isset($parameters[0]) && strpos($parameters[0], '?' ) !== false ) {
		$tmp = explode('?', trim($parameters[0], '?'));
		$parameters[0] = $tmp[0];
	}
	# Redirect to index.php if there is no url parameters
	if (! isset($parameters[0]) || strlen($parameters[0]) === 0) {
		$parameters[0] = "index";
	}

	$clean_parameters = explode('.', trim($parameters[0], '/'))[0];

	$controllerName = in_array(strtolower($clean_parameters), ["index", "blogs"]) ? ucwords($clean_parameters) . "Controller" : "Controller";
	$controller = new $controllerName();
	$modelName = isset($clean_parameters) ? ucwords($clean_parameters) : "Index";
	$model = new $modelName();
	$view = new View($controller, $model);
	$view->output();

	require_once('application/views/Footer.php');