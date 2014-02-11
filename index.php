<?
	session_start();	
	header('Content-Type: text/html; charset=utf-8');
	require_once('config.php');
	$url_parse = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
	$uri_parts = explode('/',trim($url_parse,' /'));
	$start = strstr($uri_parts[0],'index')== false?0:1;
	switch($uri_parts[$start]) {
		case "apps":
		$controller = new c_enum("apps");
		break;
		case "users":
		$controller = new c_enum("users");
		break;
		case "auth":
		$controller = new c_auth();
		break;
		default:
		$controller = new c_controller;
	}
	
	
	