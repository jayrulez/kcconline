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
?>
	<div id="content-container">
		
		<div id="content">
		<!-- login form -->
		<form id="login-form" class="forms">
        <table align ="center">
            <tr>
            	<td>Username: </td>
                <td><input type="text" name="username"/></td>
            </tr>
            <tr>
            	<td>Password:</td>
                <td><input type="passwordd" name="password"/></td>
            </tr>	
              <tr>
              <td>Remember Me</td>
                <td><input type="checkbox" name="rememberme"/></td>
            </tr>
            <tr>
            	<td align="center" colspan="2"><button  type="button">Login</button></td>
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