
<!-- $Id: example.html,v 1.4 2006/03/27 02:44:36 pat Exp $ -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Simple Tabber Example</title>

<script type="text/javascript" src="../Java Script/tabScript.js"></script>
<style type="text/css">@import"../css/student.css";</style>
<link rel="stylesheet" href="../css/tabStyle.css" TYPE="text/css" MEDIA="screen">




</head>
<body>

<h1 id="feature_head">Course Work Results</h1>


<div id="innerBG">
<div class="tabber" id = "tab1">
	<div class="tabbertab">
    
<!--  COURSE WORK RESULTS  -->
	  <h2 >Course Work Results</h2>
		<div class="tabber">
        	<?php for($i = 1; $i<=4;$i++){?>
             <div class="tabbertab">
              <h2>2008/09</h2>
              
                  <div >
                  	<h1 id="sem_h1">Semester 1</h1>
                  			<table id="student_sem">
                            <tr id="sem_head">
                                <td>Course Code</td>
                                 <td>#001</td>
                                 <td>#002</td>
                                 <td>#003</td>
                                 <td>#004</td>
                                 <td>#005</td>
                                 <td>#006</td>
                            </tr>
                         <?php for($x=1;$x<=6;$x++){?>   
                            <tr>
                            <td> <?php echo $i;?> </td>
                            <td>row 2, cell 2</td>
                            <td>row 2, cell 2</td>
                            <td>row 2, cell 2</td>
                             <td>row 2, cell 2</td>
                            <td>row 2, cell 2</td>
                            <td>row 2, cell 2</td>
                            </tr>
                            
                           <?php }?> 
                           </table>  
                  
                  </div>
                  
                  <div id="space" >
                  	<h1 id="sem_h1">Semester 2</h1>
                  			<table id="student_sem">
                            <tr id="sem_head">
                                <td>Course Code</td>
                                 <td>#001</td>
                                 <td>#002</td>
                                 <td>#003</td>
                                 <td>#004</td>
                                 <td>#005</td>
                                 <td>#006</td>
                            </tr>
                         <?php for($x=1;$x<=6;$x++){?>   
                            <tr>
                            <td>row 2, cell 1</td>
                            <td>row 2, cell 2</td>
                            <td>row 2, cell 2</td>
                            <td>row 2, cell 2</td>
                             <td>row 2, cell 2</td>
                            <td>row 2, cell 2</td>
                            <td>row 2, cell 2</td>
                            </tr>
                            
                           <?php }?> 
                           </table>  
                  
                  </div>
                  
                  
             </div>
        
        		<?php }?>    
        </div>
       
    </div>
    
<!--  TRANSCRIPT OF RESULTS  -->
    <div class="tabbertab" id = "tab2">
	  <h2>Over All Results</h2>
      
      <div >
        <h1 id="sem_h1">Transcript</h1>
                <table id="student_final">
                <tr id="sem_head">
                    <td>Course Code</td>
                     <td>#001</td>
                     <td>#002</td>
                     <td>#003</td>
                     <td>#004</td>
                     <td>#005</td>
                     <td>#006</td>
                </tr>
             <?php for($x=1;$x<=48;$x++){?>   
                <tr>
                <td> <?php echo $i;?> </td>
                <td>row 2, cell 2</td>
                <td>row 2, cell 2</td>
                <td>row 2, cell 2</td>
                 <td>row 2, cell 2</td>
                <td>row 2, cell 2</td>
                <td>row 2, cell 2</td>
                </tr>
                
               <?php }?> 
               </table>  
      
      </div>
    
    </div>

</div>

</div>
</body>
</html>
