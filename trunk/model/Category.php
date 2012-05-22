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
			$resultPointer = mysqli_query(Application::$dbLink,"select * from `category` where uid = ".mysqli_real_escape_string(Application::$dbLink,$this->uid).")");
			if($resultPointer)
			{
				if($resultPointer)
				{
					return true;
				}
			}
			return false;			
		}
		
		public function getAll()
		{
			$queryString = "select * from `category`"; 
			$resultPointer = mysqli_query(Application::$dbLink,$queryString);
			$result = array();
			if($resultPointer)
			{
				if(mysqli_num_rows($resultPointer)>0)
				{
					while($resultRow = mysqli_fetch_array($resultPointer))
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
			"'".mysqli_real_escape_string(Application::$dbLink,$this->uid)."'".",". 
			"'".mysqli_real_escape_string(Application::$dbLink,$this->name)."'".",";
			
			if(empty($this->description))
				$queryString .= ""."default"."".")";
			else
				$queryString .= "'".mysqli_real_escape_string(Application::$dbLink,$this->description)."'".")";

			echo $queryString;
			//die();
			$resultPointer = Application::$dbConnection->cquery($queryString);
			Application::$dbConnection->commit();
			if($resultPointer)
			{
				return true;
			}
			return false;	
		}
	}
?>