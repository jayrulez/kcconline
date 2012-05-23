<?php
session_start(); 

include "global.php";
$currentUser = new User;

if(isset($_REQUEST['r']))
{	
	$pagePath = Application::getApplicationRootPath().Application::$pages.$_REQUEST['r'].'.php';
	echo $pagePath;
	if(file_exists($pagePath))
	{
		if($currentUser->isLoggedIn())
		{
			$currentUser->emailAddress = $_SESSION['emailAddress'];
			$currentUser->get();
			switch($_REQUEST['r'])
			{
				case 'login':
				break;
				
				default:
					include Application::$pages.$_REQUEST['r'].'.php';
					if(isset($_REQUEST['module']))
					{
						//include Application::$pages.$_REQUEST['r'].'.php';
					}
					if(isset($_REQUEST['action']))
					{					
						include_once Application::$siteController;
					}
			}
		}
		else
		{
			switch($_REQUEST['r'])
			{
				case 'login':
				case 'home':
					include Application::$pages.$_REQUEST['r'].'.php';
					if(isset($_REQUEST['module']))
					{
						//include Application::$pages.$_REQUEST['r'].'.php';
					}
					if(isset($_REQUEST['action']))
					{					
						include_once Application::$siteController;
					}
				break;
			}
		}
	}
	else
	{
		include Application::$pages.$_REQUEST['r'].'.php';
	}
}
else
{
	include Application::$pages.'home'.'.php';
}