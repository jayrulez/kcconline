<?php

	class Application
	{
		/*Application Description*/
		public static $appName = "KCC Online";
		public static $pageTitle = "KCCOnline";
		public static $description = "";
		
		/*application resource paths*/
		public static $model = "/model/";
		public static $views = "/views/";
		public static $pages = "/views/pages/";
		public static $layout = "/views/layout/";
		public static $sections = "/views/sections/";
		public static $controller = "/controller/";
		public static $resources = "/resources/";
		public static $images = "/images/";
		public static $script = "js/";
		public static $style= "css/";
		
		public static $dbHost = "localhost";
		public static $dbUser = "root";
		public static $dbPassword = "";
		public static $dbName = "kcconline";
		public static $dbLink;
		
		public static function linkJScript($filePath)
		{
			return '<script type="text/javascript" src="'.Application::$script.$filePath.'"></script>';
		}
		
		public static function linkCss($filePath)
		{
			return '<link rel="stylesheet" type="text/css" href="'.Application::$style.$filePath.'"/>';
		}
		
		public static dbConnect()
		{
			Application::$dbLink = mysqli_connect(Application::$dbHost,Application::$dbUser,Application::$dbPassword, Application::$dbName);
			if(!Application::$dbLink)
			{
				throw new Exception('Data service is currently unavailable.');
			}
			else
			{
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
	}

?>