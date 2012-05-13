
<!-- $Id: example.html,v 1.4 2006/03/27 02:44:36 pat Exp $ -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Simple Tabber Example</title>

<script type="text/javascript" src="../Java Script/tabScript.js"></script>
<link rel="stylesheet" href="../css/tabStyle.css" TYPE="text/css" MEDIA="screen">




</head>
<body>

<h1>Course Work Results</h1>



<div class="tabber" id = "tab1">
	<div class="tabbertab">
    
<!--  COURSE WORK RESULTS  -->
	  <h2>Course Work Results</h2>
		<div class="tabber">
        	<?php
			
				for($i = 1; $i<=4;$i++)
				{
			?>
        
             <div class="tabbertab">
              <h2>2008/09</h2>
              <p>Tab 1 content.</p>
             </div>
        
        		<?php
				}
			?>    
        </div>
       
    </div>
    
<!--  TRANSCRIPT OF RESULTS  -->
    <div class="tabbertab" id = "tab2">
	  <h2>Over All Results</h2>
    
    </div>

</div>

</body>
</html>
