<?php
include "global.php";

if(isset($_REQUEST['r']))
{	
	if(file_exists($pages.$_REQUEST['r'].'php'))
	{
		include $App::$pages.$_REQUEST['r'].'.php';
	}
	else
	{
		include $App::$pages.$_REQUEST['r'].'.php';
	}
}
else
{
	include $App::$pages.'home'.'.php';
}