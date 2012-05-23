<?php
	Application::$pageTitle = "Users";

	include_once Application::$layout.'PageStart.php';

	echo Application::linkJScript("main");
	echo Application::linkCss("main.css");
	echo Application::linkCss("common.css");
	echo Application::linkCss("ie.css");
	
	include_once Application::$layout.'BodyStart.php';
	include_once Application::$layout.'Header.php';

	include_once Application::$sections.'MainNavBar.php';
	include_once Application::$sections.'TitleBar.php';
?>
	<div id="content-container">
		<?php 
			if(Application::$currentUser->isLoggedIn())
			{
				include_once Application::$layout.'LeftPanel.php'; 
			}
		?>
		<div id="content">
		<?php
			if(Application::$currentUser->isLoggedIn())
			{
				include_once Application::$userSections.'MenuTab.php'; 
				if(Application::hasModuleRequest())
				{
					if(!Application::loadModule())
					{
						echo "<p>The requested module does not exists</p>";
					}
				}
			}
		?>
		</div>
	</div>	
<?php
	include_once Application::$layout.'Footer.php';
	include_once Application::$layout.'BodyEnd.php';
	include_once Application::$layout.'PageEnd.php';
	
?>