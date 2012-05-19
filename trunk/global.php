<?php
	include_once "Application.php";
	
	$App = new Application;
	
	function __autoload($className)
	{
		include_once ($App::model.$className.'.php');
	}					
?>
	
