<?php

	class User
	{
		public $uid = null;
		public $idNumber = null;
		public $firstName = null;
		public $middleName = null;
		public $lastName = null;
		public $dob = null;
		public $emailAddress;
		public $mobilePhone = null;
		public $otherPhone = null;
		public $street = null;
		public $parish = null;
		public $password = null;
		public $country = null;
		public $active = 0;
		public $deleted = 0;
		public $datetimeCreated = null;
		public $lastAction = null;
		public $lastModified = null;
		public $imageUrl = null;
		public $gender = null;
		
		public $role;
		
		public function __construct()
		{
			$this->password = md5("password");
			$this->gender = "M";
			Application::dbConnect();	
	
		}
		
		public function authenticate()
		{
			$resultPointer = mysqli_query(Application::$dbLink,"select * from `User` where email_address = '".mysqli_real_escape_string(Application::$dbLink,$email_address)."' and password = '".md5($this->password)."')");
			if($resultPointer)
			{
				if(mysqli_num_rows($resultPointer)==1)
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
		
		public function getUser()
		{
			$resultPointer = mysqli_query(Application::$dbLink,"select * from `User` where email_address = '".mysqli_real_escape_string(Application::$dbLink,$email_address)."')");
			if($resultPointer)
			{
				if(mysqli_num_rows($resultPointer)==1)
				{
					while($resultRow = mysqli_fetch_array($resultPointer))
					{
						$this->uid = $resultRow['uid'];
						$this->firstName = $resultRow['first_name'];
						$this->middleName=$resultRow['middle_name'];
						$this->lastName=$resultRow['last_name'];
					}
					
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
				if($resultPointer)
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
			$this->idNumber = (empty($addUserForm->idNumber))?null:$addUserForm->idNumber;
			$this->firstName=$addUserForm->firstName;
			$this->middleName=(empty($addUserForm->middleName))?null:$addUserForm->middleName;
			$this->lastName=$addUserForm->lastName;
			$this->dob=$addUserForm->dob;
			$this->emailAddress=$addUserForm->emailAddress;
			$this->mobilePhone=(empty($addUserForm->mobilePhone))?null:$addUserForm->mobilePhone;
			$this->otherPhone=(empty($addUserForm->otherPhone))?null:$addUserForm->otherPhone;
			$this->street =(empty($addUserForm->street))?null:$addUserForm->street;
			$this->country =$addUserForm->country;
			$this->active =$addUserForm->active = (empty($addUserForm->active))?1:0;
			$this->imageUrl = $addUserForm->imageUrl;
		}
		
		public function save()
		{
		
			if(empty($this->uid))
			{
				$null  = 'null';
				$queryString = "insert into `user`(uid,user_id,first_name,middle_name,last_name,dob,email_address,password,phone1,phone2,street,parish,gender,country_code,active,deleted,datetime_created,last_action,last_modified,`image_url`) values(" . 
				"default,".
				"'".mysqli_real_escape_string(Application::$dbLink,$this->idNumber)."'".",". 
				"'".mysqli_real_escape_string(Application::$dbLink,$this->firstName)."'".",". 
				"'".mysqli_real_escape_string(Application::$dbLink,$this->middleName)."'".",". 
				"'".mysqli_real_escape_string(Application::$dbLink,$this->lastName)."'".",". 
				"'".mysqli_real_escape_string(Application::$dbLink,$this->dob)."'".",". 
				"'".mysqli_real_escape_string(Application::$dbLink,$this->emailAddress)."'".",". 
				"'".$this->password."'".",". 
				"'".mysqli_real_escape_string(Application::$dbLink,$this->mobilePhone)."'".",". 
				"'".mysqli_real_escape_string(Application::$dbLink,$this->otherPhone)."'".",". 
				"'".mysqli_real_escape_string(Application::$dbLink,$this->street)."'".",". 
				"'".mysqli_real_escape_string(Application::$dbLink,$this->parish)."'".",". 
				"'".mysqli_real_escape_string(Application::$dbLink,$this->gender)."'".",". 
				"'".mysqli_real_escape_string(Application::$dbLink,$this->country)."'".",". 
				""."1"."".",". 
				"".$this->deleted."".",". 
				""."NOW()"."".",". 
				"".$null."".",".
				"".$null."".",".
				"'".$this->imageUrl."'" .
				")";
				echo $queryString;
				$resultPointer = mysqli_query(Application::$dbLink,$queryString);
				if($resultPointer)
				{
					return true;
				}
				return false;	
			}
			else
			{
			}
		}
	}
?>