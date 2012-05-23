<?php
	
	
	function actionAddUser()
	{
		if(isset($_POST['addUser']))
		{
			$addUserForm = new UserForm;
			
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
			$addUserForm ->role = $_POST['role'];
			$addUserForm ->gender = $_POST['gender'];
			if(isset($_POST['activate']))
			{
				$addUserForm->active = $_POST['activate'];
			}
			
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
			$max_filesize = 1048576; // Maximum filesize in BYTES (currently 1MB).
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
				//var_dump($addUserForm);
				//$addUserFormValidator->displayErrors(20);
				//die();
				$_SESSION['addUserFormValidator'] = serialize($addUserFormValidator);
				$_SESSION['addUserForm'] = serialize($addUserForm);
				
			}
			else
			{
				$unknownUser = new User;
				$unknownUser->setUserForm($addUserForm);
				//var_dump($unknownUser);
				if($unknownUser->save())
				{
					header('Location: index.php?page=home');
				}
				else
				{
					
				}
			}
			header('Location: index.php?page=user&module=AddUser');			
		}
	}
	
	function actionSearchUser()
	{
		
		//header('Location: index.php?page=course&module=Courses');	
	}
	
	if(isset($_REQUEST['action']))
	{
		switch($_REQUEST['action'])
		{
			
			case 'addUser':
				if($Application->currentUser->hasRole('Administrator'))
				{
					actionAddUser();
				}
			break;
			
			case 'searchUser':
				actionSearchUser();
			break;
			case 'logout':
				if($Application->currentUser->isLoggedIn())
				{
					actionLogout();
				}
			break;
		}
	}
?>