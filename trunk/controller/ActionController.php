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
				$unknownUser->emailAddress = $loginForm->emailAddress;
				$unknownUser->password = $loginForm->password;;
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
			$addUserForm ->emailAddress = $_POST['emailAddress'];
			//$addUserForm ->dob = $_POST['dob'];
			$addUserForm ->mobilePhone = $_POST['mobilePhone'];
			$addUserForm ->otherPhone = $_POST['otherPhone'];
			
			
			$addUserFormValidator = new FormValidator(); 
			
			$addUserFormValidator->setRule('emailaddress','Email Address','required|valid_email|max_lenght[252]');
			$addUserFormValidator->setRule('firstName','First Name','required|max_lenght[75]');
			$addUserFormValidator->setRule('midleName','Middle Name','max_lenght[75]');
			$addUserFormValidator->setRule('lastName','Last Name','required|max_lenght[75]');
			$addUserFormValidator->setRule('idNumber','Id Number','required|max_lenght[32]');
			$addUserFormValidator->setRule('country','Country','required');
			$addUserFormValidator->setRule('mobilePhone','Mobile Number','max_lenght[20]');
			$addUserFormValidator->setRule('otherPhone','Other Number','max_lenght[20]');
			$addUserFormValidator->setRule('street','Street','max_lenght[100]');
			
			  // Configuration - Your Options
			$allowed_filetypes = array('.jpg','.gif','.bmp','.png'); // These will be the types of file that will pass the validation.
			$max_filesize = 524288; // Maximum filesize in BYTES (currently 0.5MB).
			$upload_path = Application::getApplicationRootPath().Application::$profileImages;// The place the files will be uploaded to (currently a 'files' directory).
			
			$filename = $_FILES['profilePhoto']['name']; // Get the name of the file (including file extension).
			$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
		 
				// Check if the filetype is allowed, if not DIE and inform the user.
			if(!in_array($ext,$allowed_filetypes))
			{
				$addUserFormValidator->setCustomError('firstName','The file you attempted to upload is not allowed.');
			}
			// Now check the filesize, if it is too large then DIE and inform the user.
			if(filesize($_FILES['profilePhoto']['tmp_name']) > $max_filesize)
			{
				$addUserFormValidator->setCustomError('firstName','The file you attempted to upload is too large.');
			}
			// Check if we can upload to the specified path, if not DIE and inform the user.
			if(!is_writable($upload_path))
			{
				echo $upload_path;
				die('You cannot upload to the specified directory, please CHMOD it to 777.');
			}
			// Upload the file to your specified path.
			if(move_uploaded_file($_FILES['profilePhoto']['tmp_name'],$upload_path.$_FILES['profilePhoto']['name']))
			{
				$addUserForm->imageUrl = $_FILES['profilePhoto']['name'];
				
			}
			
			else
			{
				 echo 'There was an error during the file upload.  Please try again.'; // It failed :(.
			}
			echo $_FILES['profilePhoto']['tmp_name'];
			
			$addUserFormValidator->runValidation();
			
			if(isset($_SESSION['addUserFormValidator']))
			{
				unset($_SESSION['addUserFormValidator']);
			}
			if(isset($_SESSION['addUserForm']))
			{
				unset($_SESSION['addUserForm']);
			}
			if(!$addUserFormValidator->formSuccess())
			{
				$_SESSION['addUserFormValidator'] = serialize($addUserFormValidator);
				$_SESSION['addUserForm'] = serialize($addUserForm);
				
			}
			else
			{
				$unknownUser = new User;
				$unknownUser->setAddUserForm($addUserForm);
				var_dump($unknownUser);
				if($unknownUser->save())
				{
					header('Location: index.php?r=home');
				}
				else
				{
					
				}
			}
			//header('Location: index.php?r=user&module=AddUser');			
		}
	}
		
	function actionAddCourse()
	{
		if(isset($_POST['addCourse']))
		{
			$addCourseForm = new AddUserForm;

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
					header('Location: index.php?r=home');
				}
				else
				{
					
				}
			}
			header('Location: index.php?r=course&module=AddCourse');			
		}
	}
	
	
?>