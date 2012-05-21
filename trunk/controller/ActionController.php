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
					
				}
			}
			header('Location: index.php?r=login');
		}
	}
	
	function actionAddUser()
	{
		if(isset($_POST['addUser']))
		{
			$addUserForm = new AddUserForm;
			
			$addUserForm ->firstName = $_POST['firstName'];
			$addUserForm ->middleName = $_POST['middleName'];
			$addUserForm ->lastName = $_POST['lastName'];
			$addUserForm ->street = $_POST['street'];
			$addUserForm ->country = $_POST['country'];
			$addUserForm ->idNumber = $_POST['idNumber'];
			$addUserForm ->emailAddress = $_POST['emailaddress'];
			$addUserForm ->dob = $_POST['dob'];
			$addUserForm ->mobilePhone = $_POST['mobilePhone'];
			$addUserForm ->homePhone = $_POST['homePhone'];
			$addUserForm >password = $_POST['password'];
			
			
			$addUserFormValidator = new FormValidator(); 
			
			$addUserValidator->setRule('emailaddress','Email Address','required|valid_email');
			$addUserValidator->setRule('password','Password','required');
			
			$addUserValidator->runValidation();
			
			if(isset($_SESSION['addUserFormValidator']))
			{
				unset($_SESSION['addUserFormValidator']);
			}
			if(isset($_SESSION['addUserForm']))
			{
				unset($_SESSION['addUserForm']);
			}
			if(!$addUserValidator->formSuccess())
			{
				$addUserValidator->displayErrors();
				$_SESSION['addUserFormValidator'] = serialize($addUserFormValidator);
				$_SESSION['addUserForm'] = serialize($addUserForm);
				
			}
			else
			{
				$unknownUser = new User;
				$unknownUser->setAddUserForm($addUserForm);
				
				if($unknownUser->save())
				{
					header('Location: index.php?r=home');
				}
				else
				{
					
				}
			}
			header('Location: index.php?r=user&module=AddUser');			
		}
	}
	
	
?>