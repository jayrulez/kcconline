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
		public $role = null;
		
		public function __construct()
		{
			$this->password = md5("password");
			$this->gender = "M";
			Application::dbConnect();	
	
		}
		
		public function authenticate()
		{
			$queryString = "select * from `user` where email_address = '".Application::$dbConnection->real_escape_string($this->emailAddress)."' and password = '".md5($this->password)."'";
			
			$resultPointer = Application::$dbConnection->query($queryString);
			echo $queryString;

			if($resultPointer)
			{	
				if($resultPointer->num_rows == 1)
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
			$queryString = "select * from `user` where email_address = '".Application::$dbConnection->real_escape_string($this->emailAddress)."'"; 
			$resultPointer = Application::$dbConnection->query($queryString);
			
			if($resultPointer)
			{
				if($resultPointer->num_rows==1)
				{
					while($resultRow = $resultPointer->fetch_assoc())
					{
						$this->uid = $resultRow['uid'];
						$this->firstName = $resultRow['first_name'];
						$this->middleName=$resultRow['middle_name'];
						$this->lastName=$resultRow['last_name'];
						$this->imageUrl=$resultRow['image_url'];
					}
					
					return true;
				}
			}
			return false;
		}
		
		public function exists()
		{
			$resultPointer = Application::$dbConnection->query("select * from `User` where email_address = '".Application::$dbConnection->real_escape_string($email_address)."')");
			if($resultPointer)
			{
				if($resultPointer->num_rows>0)
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
				if($_SESSION['isLoggedIn']===true)
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
		
		public function setUserForm($addUserForm)
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
			$this->active =$addUserForm->active = $addUserForm->active;
			$this->imageUrl = $addUserForm->imageUrl;
			$this->gender = $addUserForm->gender;
		}
		
		public function save()
		{
			//var_dump($this);
			
			if(empty($this->uid))
			{
				$null  = 'null';
				$queryString = "insert into `user`(uid,user_id,first_name,middle_name,last_name,dob,email_address,password,phone1,phone2,street,parish,gender,country_code,active,deleted,datetime_created,last_action,last_modified,`image_url`) values(" . 
				"default,".
				"'".Application::$dbConnection->real_escape_string($this->idNumber)."'".",". 
				"'".Application::$dbConnection->real_escape_string($this->firstName)."'".","; 
				
				if(empty($this->middleName))
					$queryString .= ""."default"."".",";
				else
					$queryString .= "'".Application::$dbConnection->real_escape_string($this->middleName)."'".",";			
					
				$queryString .= "'".Application::$dbConnection->real_escape_string($this->lastName)."'".",";
				$queryString .= "'".Application::$dbConnection->real_escape_string($this->dob)."'".",";
				$queryString .= "'".Application::$dbConnection->real_escape_string($this->emailAddress)."'".",";
				
				$queryString .= "'".$this->password."'".",";
				
				if(empty($this->mobilePhone))
					$queryString .= ""."default"."".",";
				else				
					$queryString .= "'".Application::$dbConnection->real_escape_string($this->mobilePhone)."'".",";
					
				if(empty($this->otherPhone))
					$queryString .= ""."default"."".",";
				else
					$queryString .= "'".Application::$dbConnection->real_escape_string($this->otherPhone)."'".",";
					
				if(empty($this->street))
					$queryString .= ""."default"."".",";
				else
					$queryString .= "'".Application::$dbConnection->real_escape_string($this->street)."'".","; 
				
				if(empty($this->parish))
					$queryString .= ""."default"."".",";
				else				
					$queryString .= "'".Application::$dbConnection->real_escape_string($this->parish)."'".",";
				
				$queryString .= "'".Application::$dbConnection->real_escape_string($this->gender)."'".",";
				$queryString .= "'".Application::$dbConnection->real_escape_string($this->country)."'".",";
				
				$queryString .= "".$this->active."".",". 
				$queryString .= "".$this->deleted."".",". 
				$queryString .= ""."NOW()"."".",";
				$queryString .= ""."default"."".",";
				$queryString .= ""."default"."".",";
				
				if(empty($this->imageUrl))
					$queryString .= ""."default"."".",";
				else
				$queryString .= "'".$this->imageUrl."'";		
				")";
				echo $queryString;
				try
				{
					Application::$dbConnection->query($queryString);
				
					if(!empty($this->role))
					{
						$queryString = "insert into `user_role`(role_id,user_id) values(".$this->role.",".$this->uid.")";
						Application::$dbConnection->query($queryString);
					}
					Application::$dbConnection->commit();
					return true;
				}
				catch(Exception $ex)
				{
					Application::$dbConnection->rollback();
				}
				return false;
			}
			else
			{
			}
		}
	}
?>