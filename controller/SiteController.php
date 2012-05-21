<?php
	
	include_once 'ActionController.php';
	
	if(isset($_REQUEST['action']))
	{
		switch($_REQUEST['action'])
		{
			case 'login':
				actionLogin();
			break;
			
			case 'addUser':
				actionAddUser();
			break;
		}
	}

?>