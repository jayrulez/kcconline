<?php
	class Course
	{
		public $courseCode = null;
		public $courseName = null;
		public $description;
		public $category;
		public $datetimeCreated;
		public $lastModified;
		public $keyRequired = 0;
		public $enrollmentKey;
		
		public function __construct()
		{
			Application::dbConnect();	
	
		}
		
		public function get()
		{
			$queryString = "select * from `course` where course_code = '".mysqli_real_escape_string(Application::$dbLink,$this->courseCode)."'"; 
			$resultPointer = mysqli_query(Application::$dbLink,$queryString);
			
	
			if($resultPointer)
			{
				if(mysqli_num_rows($resultPointer)==1)
				{
					while($resultRow = mysqli_fetch_array($resultPointer))
					{
						$this->courseCode = $resultRow['course_code'];
						$this->courseName = $resultRow['course_name'];
						$this->description=$resultRow['description'];
						$this->category=$resultRow['category_id'];
					}
					
					return true;
				}
			}
			return false;
		}
		
		public function exists()
		{
			$queryString = "select * from `course` where course_code = '".mysqli_real_escape_string(Application::$dbLink,$this->courseCode)."'"; 
			$resultPointer = mysqli_query(Application::$dbLink,$queryString);
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
			$queryString = "select * from `course`"; 
			$resultPointer = mysqli_query(Application::$dbLink,$queryString);
			$result = array();
			if($resultPointer)
			{
				if(mysqli_num_rows($resultPointer)==1)
				{
					while($resultRow = mysqli_fetch_array($resultPointer))
					{
						array_push($result,$resultRow);
					/*
						$this->courseCode = $resultRow['course_code'];
						$this->courseName = $resultRow['course_name'];
						$this->description=$resultRow['description'];
						$this->category=$resultRow['category_id'];
						*/
					}
				}
			}
			return $result;
		}
		
		public function setCourseForm($courseForm)
		{
			$this->courseCode = $courseForm->courseCode;
			$this->courseName = $courseForm->courseName;
			$this->description = $courseForm->description;
			$this->category = $courseForm->category;
		}
		
		public function save()
		{
		
			$null  = 'null';
			$queryString = "insert into `course`(course_code,name,description,category_id,datetime_created,last_modified,key_required,enrollment_key) values(".
			"'".mysqli_real_escape_string(Application::$dbLink,$this->courseCode)."'".",". 
			"'".mysqli_real_escape_string(Application::$dbLink,$this->courseName)."'".",";
			
			if(empty($this->description))
				$queryString .= ""."default"."".",";
			else
				$queryString .= "'".mysqli_real_escape_string(Application::$dbLink,$this->description)."'".",";
				
			if(empty($this->category))
				$queryString .= ""."default"."".",";
			else
				$queryString .= "'".mysqli_real_escape_string(Application::$dbLink,$this->category)."'".",";
			 
			$queryString .=""."NOW()"."".",";
			
			if(empty($this->lastModified))
				$queryString .= ""."default"."".",";
			else
				$queryString .= "'".mysqli_real_escape_string(Application::$dbLink,$this->lastModified)."'".",";				
	
			$queryString .= "".$this->keyRequired."".",";
			
			if(empty($this->lastModified))
				$queryString .= ""."default"."".")";
			else
				$queryString .= "'".md5($this->enrollmentKey)."'".")"; 	
				
			echo $queryString;
			//die();
			$resultPointer = mysqli_query(Application::$dbLink,$queryString);
			
			if($resultPointer)
			{
				return true;
			}
			return false;	
		}
	}
?>