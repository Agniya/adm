<?
	function __autoload($className){ 
	$ext = explode('_',$className);
		if(file_exists($ext[0].'/'.$className . '.php')) { 
			require_once $ext[0].'/'.$className . '.php'; 
			return true; 
		} 
		return false; 
	} 
define("BASE_URL","/");	
define("DB_PDODRIVER","mysql");
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "admin");
	