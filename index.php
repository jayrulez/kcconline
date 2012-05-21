<?php
session_start(); 

include "global.php";

if(isset($_REQUEST['r']))
{	
	$pagePath = Application::getApplicationRootPath().Application::$pages.$_REQUEST['r'].'.php';
	echo $pagePath;
	if(file_exists($pagePath))
	{
		echo "page found";
		if(isset($_REQUEST['action']))
		{
			
			include_once Application::$siteController;
		}
		else
		{
			include Application::$pages.$_REQUEST['r'].'.php';
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