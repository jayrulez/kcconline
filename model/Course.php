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
			$queryString = "select * from `course` where course_code = '".Application::$dbConnection->real_escape_string($this->courseCode)."'"; 
			$resultPointer = Application::$dbConnection->query($queryString);	
	
			if($resultPointer)
			{
				if($resultPointer->num_rows==1)
				{
					while($resultRow = $resultPointer->fetch_assoc())
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
			$queryString = "select * from `course` where course_code = '".Application::$dbConnection->real_escape_string($this->courseCode)."'"; 
			$resultPointer = Application::$dbConnection->query($queryString);	
			
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
			$queryString = "select course.*, category.uid as categoryId,category.name as categoryName, category.description as categoryDescription from `course` left join category on course.category_id = category.uid"; 
			$resultPointer = Application::$dbConnection->query($queryString);
			$result = array();

			if($resultPointer)
			{
				if($resultPointer->num_rows>0)
				{
					while($resultRow = $resultPointer->fetch_assoc())
					{
						array_push($result,$resultRow);
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
			"'".Application::$dbConnection->real_escape_string($this->courseCode)."'".",". 
			"'".Application::$dbConnection->real_escape_string($this->courseName)."'".",";
			
			if(empty($this->description))
				$queryString .= ""."default"."".",";
			else
				$queryString .= "'".Application::$dbConnection->real_escape_string($this->description)."'".",";
				
			if(empty($this->category))
				$queryString .= ""."default"."".",";
			else
				$queryString .= "'".Application::$dbConnection->real_escape_string($this->category)."'".",";
			 
			$queryString .=""."NOW()"."".",";
			
			if(empty($this->lastModified))
				$queryString .= ""."default"."".",";
			else
				$queryString .= "'".Application::$dbConnection->real_escape_string($this->lastModified)."'".",";				
	
			$queryString .= "".$this->keyRequired."".",";
			
			if(empty($this->lastModified))
				$queryString .= ""."default"."".")";
			else
				$queryString .= "'".md5($this->enrollmentKey)."'".")"; 	
				
			echo $queryString;

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