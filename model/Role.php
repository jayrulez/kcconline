<?php
	class Role
	{
		public $uid;
		public $name;
		public $description;
		
		public function __construct()
		{
			Application::dbConnect();	
		}
		
		public function get()
		{
			$queryString = "select * from `role` where uid = ".Application::$dbConnection->real_escape_string($this->uid).""; 
			$resultPointer = Application::$dbConnection->query($queryString);
			
	
			if($resultPointer)
			{
				if($resultPointer->num_rows==1)
				{
					while($resultRow = $resultPointer->fetch_assoc())
					{
						$this->uid = $resultRow['uid'];
						$this->name = $resultRow['name'];
						$this->description=$resultRow['description'];
					}
					
					return true;
				}
			}
			return false;
		}
		
		public function exists()
		{
			$resultPointer = Application::$dbConnection->query("select * from `role` where uid = ".Application::$dbConnection->real_escape_string($this->uid).")");
			if($resultPointer)
			{
				if($resultPointer->num_rows>0)
				{
					return true;
				}
			}
			return false;			
		}
		
		public function getAll()
		{
			$queryString = "select * from `role`"; 
			$resultPointer = Application::$dbConnection->query($queryString);
			$result = array();
			if($resultPointer)
			{
				if($resultPointer->num_rows > 1)
				{
					while($resultRow = $resultPointer->fetch_assoc())
					{
						array_push($result,$resultRow);
						/*
						$this->uid = $resultRow['uid'];
						$this->name = $resultRow['name'];
						$this->description=$resultRow['description'];
						*/
					}
				}
			}
			return $result;
		}
		
		public function isRole($name)
		{
			if(strcasecmp($this->name,$name)==0)
			{
				return true;
			}
			return false;
		}
		
		public function setRoleForm($roleForm)
		{
			$this->name = $roleForm->name;
			$this->description = $roleForm->description;;
		}
		
		public function save()
		{
		
			$null  = 'null';
			$queryString = "insert into `role`(uid,name,description) values(".
			"'".Application::$dbConnection->real_escape_string($this->uid)."'".",". 
			"'".Application::$dbConnection->real_escape_string($this->name)."'".",";
			
			if(empty($this->description))
				$queryString .= ""."default"."".")";
			else
				$queryString .= "'".Application::$dbConnection->real_escape_string($this->description)."'".")";

			echo $queryString;
			//die();
			$resultPointer = Application::$dbConnection->query($queryString);
			
			if($resultPointer)
			{
				return true;
			}
			return false;	
		}
	}
?>