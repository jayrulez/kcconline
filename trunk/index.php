<?php
	session_start(); 

	include "global.php";
	Application::$currentUser = new User;
	Application::$currentUser->refreshSession();
	Application::$currentUser->get();

	if(Application::hasPageRequest())
	{	
		if(Application::hasPage())
		{
			include Application::$pages.$_REQUEST['page'].'.php';
		}
		else
		{
			include Application::$pages.'home.php';
		}
	}
	else
	{
		header('Location: '.Application::$previousUrl);	
	}

	if(isset($_REQUEST['action']))
	{	
		if(isset($_REQUEST['page']))
		{
			include Application::$controller.$_REQUEST['action']."/"."controller.php";
		}
		else
		{
			include Application::$controller."controller.php";
		}
	}

?>