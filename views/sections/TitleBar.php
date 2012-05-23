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
	?>
<div>