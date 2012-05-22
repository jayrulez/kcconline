<?php
	Application::$pageTitle = "Courses";

	include_once Application::$layout.'PageStart.php';

	echo Application::linkJScript("main");
	echo Application::linkCss("main.css");
	echo Application::linkCss("common.css");
	echo Application::linkCss("ie.css");
	
	include_once Application::$layout.'BodyStart.php';
	include_once Application::$layout.'Header.php';

	include_once Application::$sections.'MainNavBar.php';
?>
	<div id="content-container">
		<?php include_once Application::$layout.'LeftPanel.php'; ?>
		<div id="content">
		<?php
			include_once Application::$courseSections.'MenuTab.php'; 
			if(Application::hasModuleRequest())
			{
				Application::loadModule();
			}
		?>
		</div>
	</div>	
<?php
	include_once Application::$layout.'Footer.php';
	include_once Application::$layout.'BodyEnd.php';
	include_once Application::$layout.'PageEnd.php';
	
?>