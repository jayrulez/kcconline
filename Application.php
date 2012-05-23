<?php

	class Application
	{
		/*Application Description*/
		public static $appRootName = "kcconline";
		public static $appName = "KCC Online";
		public static $pageTitle = "KCCOnline";
		public static $moduleTitle = "";
		public static $sectionTitle = "";
		public static $description = "";
		
		/*Pages Url*/
		public static $previousUrl = "";
		public static $currentUrl = "";
		public static $homeUrl = "index.php?r=home";
		
		/*application resource paths*/
		public static $model = "/model/";
		public static $views = "/views/";
		public static $pages = "/views/pages/";
		public static $layout = "/views/layout/";
		public static $sections = "/views/sections/";
		public static $userSections = "/views/sections/user/";
		public static $courseSections = "/views/sections/course/";
		public static $module = "/views/module/";
		public static $controller = "/controller/";
		public static $siteController = "/controller/SiteController.php";
		public static $resources = "/resources/";
		public static $images = "/images/";
		public static $profileImages = "/images/profile/";
		public static $script = "js/";
		public static $style= "css/";
		
		public static $dbHost = "localhost";
		public static $dbUser = "root";
		public static $dbPassword = "";
		public static $dbName = "kcconline";
		public static $dbConnection;
		
		public static function linkJScript($filePath)
		{
			return '<script type="text/javascript" src="'.Application::$script.$filePath.'"></script>';
		}
		
		public static function linkCss($filePath)
		{
			return '<link rel="stylesheet" type="text/css" href="'.Application::$style.$filePath.'"/>';
		}
		
		public static function dbConnect()
		{
			Application::$dbConnection = new mysqli(Application::$dbHost,Application::$dbUser,Application::$dbPassword, Application::$dbName);
			if (Application::$dbConnection->connect_errno) 
			{
				throw new Exception('Data service is currently unavailable.');
			}
			else
			{
				Application::$dbConnection->autocommit(false);
				return true;
				/*
				if(mysqli_select_db($dbLink,$dbName))
				{	
					return true;
				}
				else
				{
					throw new Exception('Data services could not be found.');
				}
				*/
			}
		}
		
		public static function getApplicationRootPath()
		{
			return $_SERVER['DOCUMENT_ROOT'].'/'.Application::$appRootName;
		}
		
		public static function hasModuleRequest()
		{
			if(isset($_REQUEST['module']))
			{
				return true;
			}
			return false;
		}
		
		public static function loadModule()
		{
			if(isset($_REQUEST['module']))
			{
				Application::$sectionTitle = $_REQUEST['module'];
				$modulePath = Application::getApplicationRootPath().Application::$module.$_REQUEST['module'].'.php';
				
				if(file_exists($modulePath))
				{
					include $modulePath;
					return true;
				}
			}
			return false;
		}
			
		public static function hasModule()
		{
			if(isset($_REQUEST['module']))
			{
				Application::$sectionTitle = $_REQUEST['module'];
				$modulePath = Application::getApplicationRootPath().Application::$module.$_REQUEST['module'].'.php';
				
				if(file_exists($modulePath))
				{
					return true;
				}
			}
			return false;
		}		
		public static function getModuleTitle()
		{
			if(Application::hasModule())
			{	
				$getModuleTitle = true;
				$modulePath = Application::$module.$_REQUEST['module'].'.php';
				include $modulePath;
				if(isset($moduleTitle))
				{
					return Application::$moduleTitle;
				}
			}
			return "";
		}	
	}

?>