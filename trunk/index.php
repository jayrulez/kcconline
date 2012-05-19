<?php
include "global.php";

if(isset($_REQUEST['r']))
{	
	if(file_exists(Application::$pages.$_REQUEST['r'].'php'))
	{
		include Application::$pages.$_REQUEST['r'].'.php';
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