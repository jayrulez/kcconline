<?php
	
	function actionAddCourse()
	{
		if(isset($_POST['addCourse']))
		{
			$addCourseForm = new CourseForm;

			$addCourseForm ->courseCode = trim($_POST['courseCode']);
			$addCourseForm ->courseCode = (empty($addCourseForm ->courseCode)) ? null : $addCourseForm ->courseCode;
			
			$addCourseForm ->courseName = trim($_POST['courseName']);
			$addCourseForm ->courseName = (empty($addCourseForm ->courseName)) ? null : $addCourseForm ->courseName;
			
			$addCourseForm ->description = trim($_POST['description']);
			$addCourseForm ->description = (empty($addCourseForm ->description)) ? null : $addCourseForm ->description;
			
			$addCourseForm ->category = trim($_POST['category']);
			$addCourseForm ->category = (empty($addCourseForm ->category)) ? null : $addCourseForm ->category;
			
			$addCourseForm ->enrollmentKey = trim($_POST['enrollmentKey']);
			$addCourseForm ->enrollmentKey = (empty($addCourseForm ->enrollmentKey)) ? null : $addCourseForm ->enrollmentKey;
			
			$addCourseFormValidator = new FormValidator(); 
			
			$addCourseFormValidator->setRule('courseCode','Course Code','required|max_lenght[252]');
			$addCourseFormValidator->setRule('courseName','Course Name','required|max_lenght[100]');
			$addCourseFormValidator->setRule('description','Description','max_lenght[255]');
			$addCourseFormValidator->setRule('enrollmentKey','Enrollment Key','min_lenght[8]|max_lenght[128]');
			
			
			$addCourseFormValidator->runValidation();
			
			if(isset($_SESSION['addCourseFormValidator']))
			{
				unset($_SESSION['addCourseFormValidator']);
			}
			if(isset($_SESSION['addCourseForm']))
			{
				unset($_SESSION['addCourseForm']);
			}
			if(!$addCourseFormValidator->formSuccess())
			{
				$_SESSION['addCourseFormValidator'] = serialize($addCourseFormValidator);
				$_SESSION['addCourseForm'] = serialize($addCourseForm);
				
			}
			else
			{
				$courseObj = new Course;
				$courseObj->setCourseForm($addCourseForm);
				
				if($courseObj->save())
				{
					header('Location: index.php?page=home');
				}
				else
				{
					
				}
			}
			header('Location: index.php?page=course&module=AddCourse');			
		}
	}
	function actionAddCategory()
	{
		if(isset($_POST['addCategory']))
		{
			$addCategoryForm = new CategoryForm;
			
			$addCategoryForm ->name = trim($_POST['name']);
			$addCategoryForm ->name = (empty($addCategoryForm ->name)) ? null : $addCategoryForm ->name;
			
			$addCategoryForm ->description = trim($_POST['description']);
			$addCategoryForm ->description = (empty($addCategoryForm ->description)) ? null : $addCategoryForm ->description;
			
			$addCategoryFormValidator = new FormValidator(); 
			
			$addCategoryFormValidator->setRule('name','Category Name','required|max_lenght[100]');
			$addCategoryFormValidator->setRule('description','Description','max_lenght[255]');
			
			
			$addCategoryFormValidator->runValidation();
			
			if(isset($_SESSION['addCategoryFormValidator']))
			{
				unset($_SESSION['addCategoryFormValidator']);
			}
			if(isset($_SESSION['addCategoryForm']))
			{
				unset($_SESSION['addCategoryForm']);
			}
			if(!$addCategoryFormValidator->formSuccess())
			{
				$_SESSION['addCategoryFormValidator'] = serialize($addCategoryFormValidator);
				$_SESSION['addCategoryForm'] = serialize($addCategoryForm);
				
			}
			else
			{
				$categoryObj = new Category;
				$categoryObj->setCategoryForm($addCategoryForm);
				
				if($categoryObj->save())
				{
					header('Location: index.php?page=home');
				}
				else
				{
					
				}
			}
			header('Location: index.php?page=course&module=AddCategory');			
		}
	}
	function actionSearchCourse()
	{
		
		//header('Location: index.php?r=course&module=Courses');	
	}
	
	function actionSearchCategory()
	{
		
		//header('Location: index.php?r=course&module=Courses');	
	}
	
	if(isset($_REQUEST['action']))
	{
		switch($_REQUEST['action'])
		{
			
			case 'addCourse':
				if($Application->currentUser->hasRole('Administrator'))
				{
					actionAddCourse();
				}
			break;
			
			case 'addCategory':
				if($Application->currentUser->hasRole('Administrator'))
				{
					actionAddCategory();
				}
			break;
			
			case 'searchCourse':
				actionSearchCourse();
			break;
			
			case 'searchCategory':
				actionSearchCatgeory();
			break;
		}
	}

	

		

?>