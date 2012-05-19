<?php
	include_once "Application.php";
	
	$App = new Application;			
	
	function __autoload($className)
	{
		global $App;
		include_once (Application::$model.$className.'.php');
	}		
?>
	
