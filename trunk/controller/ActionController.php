<?php
	
	function actionLogin()
	{
		if(isset($_POST['login']))
		{
			$loginForm = new LoginForm;
			
			$loginForm->emailAddress = $_POST['emailaddress'];
			$loginForm->password = $_POST['password'];
			
			$loginFormValidator = new FormValidator; 
			
			$loginFormValidator->setRule('emailaddress','Email Address','required|valid_email');
			$loginFormValidator->setRule('password','Password','required');
			
			$loginFormValidator->runValidation();
			
			if(isset($_SESSION['loginFormValidator']))
			{
				unset($_SESSION['loginFormValidator']);
			}
			if(!$loginFormValidator->formSuccess())
			{
				$_SESSION['loginFormValidator'] = serialize($loginFormValidator);
				
			}
			else
			{
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