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
		public static $script = "/js/";
		
		public static function linkJScript($filePath)
		{
			return '<script type="text/javascript" src="'.$script.$filePath.'"'.'></script>';
		}
		
		public static function linkCss($filePath)
		{
			return '<link rel="stylesheet" type="text/css" href="'.$script.$filePath.'"'.'/>';
		}
	}

?>