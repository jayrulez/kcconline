<?php

	function actionLogout()
	{
		if(Application::$currentUser->isLoggedIn())
		{
			Application::$currentUser->logout();
			header('Location: index.php?page=home');
		}
	}
	function actionLogin()
	{
		if(isset($_POST['login']))
		{
			$loginForm = new LoginForm;
			
			$loginForm->emailAddress = $_POST['emailaddress'];
			$loginForm->password = $_POST['password'];
			
			
			$loginFormValidator = new FormValidator(); 
			
			$loginFormValidator->setRule('emailaddress','Email Address','required|valid_email');
			$loginFormValidator->setRule('password','Password','required');
			
			$loginFormValidator->runValidation();
			
			if(isset($_SESSION['loginFormValidator']))
			{
				unset($_SESSION['loginFormValidator']);
			}
			if(isset($_SESSION['loginForm']))
			{
				unset($_SESSION['loginForm']);
			}
			if(!$loginFormValidator->formSuccess())
			{
			
				$loginFormValidator->displayErrors();
				$_SESSION['loginFormValidator'] = serialize($loginFormValidator);
				$_SESSION['loginForm'] = serialize($loginForm);
				
			}
			else
			{
				$unknownUser = new User;
				$unknownUser->emailAddress = $loginForm->emailAddress;
				$unknownUser->password = $loginForm->password;;
				if($unknownUser->authenticate())
				{
					
					header('Location: index.php?page=home');
				}
				else
				{
					
				}
			}
			header('Location: index.php?page=login');
		}
	}
		

	if(isset($_REQUEST['action']))
	{
		switch($_REQUEST['action'])
		{
			case 'login':
				if(!$Application->currentUser->isloggedIn())
				{
					actionLogin();
				}
			break;
			
			case 'logout':
				if($Application->currentUser->isLoggedIn())
				{
					actionLogout();
				}
			break;
		}
	}

?>