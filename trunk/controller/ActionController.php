<?php
	
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
				$unknownUser->emailAddress = $_POST['emailaddress'];
				$unknownUser->password = $_POST['password'];
				if($unknownUser->authenticate())
				{
					header('Location: index.php?r=home');
				}
				else
				{
					//$formResult = array("username"=>array("pass"=>false,"msg"=>""),"password"=>array("pass"=>false,"msg"=>""),"form-status"=>$formStatus);
				}
			}
			header('Location: index.php?r=login');
		}
	}
	
?>