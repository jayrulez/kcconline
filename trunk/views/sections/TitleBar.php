<div>
	<?php
		if(Application::hasModule())
		{
			Application::getModuleTitle();
			echo Application::$pageTitle.'->'.Application::$moduleTitle;
		}
		else
		{
			echo Application::$pageTitle;
		}
	
		if(Application::$currentUser->isLoggedIn())
		{
			echo '<a href="index.php?action=logout">Logout</a>';
		}
		else
		{
			echo '<a href="index.php?r=login">Login</a>';
		}
	?>
<div>