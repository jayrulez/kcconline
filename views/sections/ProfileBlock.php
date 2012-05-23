<head>
	<style type="text/css">@import"../../css/sectionStyles.css";</style>
</head>

<div id="profile-block">
	<div id="left-nav-profile-photo" class="profile-photo">
    	   	
        <div id="profile">
			<?php
				$imageUrl = "";
				if(empty(Application::$currentUser->imageUrl))
				{
					$imageUrl = "blank_profile.jpg";
				}
				else
				{
					$imageUrl = Application::$currentUser->imageUrl;
				}
				echo Application::$profileImages.$imageUrl;
			?>
            <img  src = "<?php echo Application::$profileImages.$imageUrl;?>" width = "150" height="150"/>
        </div>
        <div  id="userName"><?php echo Application::$currentUser->firstName." ".Application::$currentUser->lastName; ?></div>
       <a href="url">Edit Profile</a>
       
    	<div id="message">
            <h3>Messages</h3>
            <div id="messageOp">
            	<ul>
                	<li> <a href="url">Compose</a></li>
                    <li> <a href="url">Inbox</a></li>
                    <li> <a href="url">Sent</a></li>
                </ul>
            </div>	
        </div>
          
	</div>
</div>