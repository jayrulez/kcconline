<?php
	class Category
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
			$queryString = "select * from `category` where uid = ".mysqli_real_escape_string(Application::$dbLink,$this->uid).""; 
			$resultPointer = mysqli_query(Application::$dbLink,$queryString);
			
	
			if($resultPointer)
			{
				if(mysqli_num_rows($resultPointer)==1)
				{
					while($resultRow = mysqli_fetch_array($resultPointer))
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
			$resultPointer = Application::$dbConnection->query("select * from `category` where uid = ".Application::$dbConnection->real_escape_string($this->uid).")");
			if($resultPointer)
			{
				if($resultPointer->num_rows > 0)
				{
					return true;
				}
			}
			return false;			
		}
		
		public function getAll()
		{
			$queryString = "select * from `category`"; 
			$resultPointer = Application::$dbConnection->query($queryString);
			$result = array();
			if($resultPointer)
			{
				if($resultPointer->num_rows>0)
				{
					while($resultRow->fetch_assoc())
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
		
		public function setCategoryForm($categoryForm)
		{
			$this->name = $categoryForm->name;
			$this->description = $categoryForm->description;;
		}
		
		public function save()
		{
		
			$null  = 'null';
			$queryString = "insert into `category`(uid,name,description) values(".
			"'".Application::$dbConnection->real_escape_string($this->uid)."'".",". 
			"'".Application::$dbConnection->real_escape_string($this->name)."'".",";
			
			if(empty($this->description))
				$queryString .= ""."default"."".")";
			else
				$queryString .= "'".Application::$dbConnection->real_escape_string($this->description)."'".")";

			echo $queryString;
			//die();
			$resultPointer = Application::$dbConnection->query($queryString);
			Application::$dbConnection->commit();
			if($resultPointer)
			{
				return true;
			}
			return false;	
		}
	}
?>