
	<div id="content-container">
		
		<div id="content">
		<!-- login form -->
		<form id="login-form" class="forms">
        <table align ="center">
            <tr>
            	<td>Course Code: </td>
                <td align="center"><input type="text" name="courseCode"/></td>
                <td>Course Name: </td>
                <td align="center"><input type="text" name="courseName"/></td>
            </tr>
              <tr>
            	<td>Category: </td>
                <td align="center">
                    <select>
                      <option>None</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                    </select>
                  </td>
                  <td colspan="2" align="center"><button  type="button">Search</button> </td>
            </tr>
        </table>
        </form>
        
        <form>
        	<table  align="center">
            	<tr>
                	<td  align="center">Course Code</td>
                    <td  align="center">Course Name</td>
                    <td  align="center">Category</td>
                    
                </tr>
                <?php for($i=0;$i<=5;$i++){ ?>
                <tr>
                	<td  align="center"><?php ?></td>
                    <td  align="center"><?php ?></td>
                    <td  align="center"><?php ?></td>
                    <td  align="center">edit</td>
                    <td  align="center">view</td>
                    <td  align="center">delete</td>
                </tr>
                <?php }?>
            </table>
        </form>
		</div>
	</div>	
