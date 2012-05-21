<?php

	class User
	{
		public $uid;
		public $user_id;
		public $firstName;
		public $middleName;
		public $lastName;
		public $dob;
		public $emailAddress;
		public $mobilePhone;
		public $homePhone;
		public $street;
		public $parish;
		public $country;
		public $active = 0;
		public $deleted = 0;
		public $datetimeCreated;
		public $lastAction;
		public $lastModified;
		public $imageUrl;
		
		public $role;
		
		public function __construct()
		{

			Application::dbConnect();	
	
		}
		
		public function authenticate()
		{
			$resultPointer = mysqli_query(Application::$dbLink,"select * from `User` where email_address = '".mysqli_real_escape_string(Application::$dbLink,$email_address)."' and password = '".md5($this->password)."')");
			if($resultPointer)
			{
				if($resultPointer>0)
				{
					$_SESSION['emailAddress'] = $this->emailAddress;
					$_SESSION['isLoggedIn'] = true;
					
					$this->loggedIn =  true;
					$_SESSION['lastActiveTime'] = time();
					
					return true;
				}
			}
			return false;
		}
		
		public function userExists()
		{
			$resultPointer = mysqli_query(Application::$dbLink,"select * from `User` where email_address = '".mysqli_real_escape_stringmd5(Application::$dbLink,$email_address)."')");
			if($resultPointer)
			{
				if($resultPointer>0)
				{
					return true;
				}
			}
			return false;			
		}
		
		public function getUserRole()
		{
		}
		
		public function getRole()
		{
		}
		
		public function isTimedOut()
		{
			//$currentTime = time();
			if(isset($_SESSION['lastActiveTime']))
			{
				$idleTime = time() - $_SESSION['lastActiveTime'] ;
				
				if(($idleTime/60)>5)
				{	
					return true;
				}
				else
				{
					$_SESSION['lastActiveTime'] = time();
					return false;
				}
			}
			else
			{
				return true;
			}
		}
		public function timeoutUser()
		{
			if(isset($_SESSION['lastActiveTime']))
			{
				$idleTime = time() - $_SESSION['lastActiveTime'] ;
				
				if(($idleTime/60)>5)
				{	
					$this->logoutUser();
					return true;
				}
				else
				{
					$_SESSION['lastActiveTime'] = time();
					return false;
				}
			}
			else
			{
				return true;
			}
		}
		
		public function isLoggedIn()
		{
			if(isset($_SESSION['isLoggedIn']))
			{	
				if($_SESSION['']===true)
				{
					return true;
				}
			}
			return false;
		}
		
		public function logoutUser()
		{
			//setcookie('emailAddress',$this->emailAddress,time()*60*24);
			if(isset($_SESSION['emailAddress']))
			{
				unset($_SESSION['emailAddress']);
			}
			if(isset($_SESSION['isLoggedIn']))
			{
				unset($_SESSION['isLoggedIn']);
			}
			if(isset($_SESSION['lastActiveTime']))
			{
				unset($_SESSION['lastActiveTime']);
			}
			return true;
		}
		
		public function setAddUserForm($addUserForm)
		{
			
		}
	}
?>