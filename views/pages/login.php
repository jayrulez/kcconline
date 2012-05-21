<?php
	Application::$pageTitle = "Login";

	include_once Application::$layout.'PageStart.php';

	echo Application::linkJScript("main");
	echo Application::linkCss("main.css");
	echo Application::linkCss("common.css");
	echo Application::linkCss("ie.css");
	
	include_once Application::$layout.'BodyStart.php';
	include_once Application::$layout.'Header.php';

	include_once Application::$sections.'MainNavBar.php';
	
	if(isset($_SESSION['login-form']))
	{
		
	}
?>
	<div id="content-container">
		
		<div id="content">
		<!-- login form -->
	<?php
		if(isset($_SESSION['loginFormValidator']))
		{
			$loginFormValidator = unserialize($_SESSION['loginFormValidator']);
			$loginFormValidator->displayErrors();
		}
	?>
		<form id="login-form" class="forms" method="post" action="index.php?r=login&action=login">
        <table align ="center">
            <tr>
            	<td>Email Address: </td>
                <td><input type="text" name="emailaddress"/></td>
            </tr>
            <tr>
            	<td>Password:</td>
                <td><input type="password" name="password"/></td>
            </tr>	
              <tr>
              <td>Remember Me</td>
                <td><input type="checkbox" name="rememberme"/></td>
            </tr>
            <tr>
            	<td align="center" colspan="2"><button  name="login" type="submit">Login</button></td>
            </tr>
        </table>
        </form>
		</div>
	</div>	
<?php
	include_once Application::$layout.'Footer.php';
	include_once Application::$layout.'BodyEnd.php';
	include_once Application::$layout.'PageEnd.php';
	
?>