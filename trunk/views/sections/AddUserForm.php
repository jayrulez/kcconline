
	<div id="content-container">
		
		<div id="content">
		<!-- login form -->
		<form id="login-form" class="forms">
        <table align ="center">
            <tr>
            	<td>First Name: </td>
                <td align="center"><input type="text" name="fName"/></td>
            </tr>
               <tr>
            	<td>Middle Name: </td>
                <td align="center"><input type="text" name="mName"/></td>
            </tr>
            <tr>
            	<td>Last Name:</td>
                <td align="center"><input type="passwordd" name="lName"/></td>
            </tr>
              <tr>
            	<td>Street: </td>
                <td align="center"><input type="text" name="street"/></td>
            </tr>
              <tr>
            	<td>Country: </td>
                <td align="center">
                    <select>
                      <option>Jamaica</option>
                      <option>Barbados</option>
                      <option>Trinidad</option>
                      <option>Somewhere</option>
                    </select>
                  </td>
            </tr>
              <tr>
            	<td>ID Number: </td>
                <td align="center"><input type="text" name="idNum"/></td>
            </tr>
              <tr>
            	<td>Email: </td>
                <td align="center"><input type="text" name="email"/></td>
            </tr>
             <tr>
            	<td>Date Of Birth: </td>
                <td align="center">
                	<select>
                      <option>Day</option>
                      <?php  for($i=1;$i<=31;$i++){  ?>
                      	<option> <?php echo $i; ?></option>
                      <?php    }?>
                    </select>
                    <select>
                      <option>Month</option>
                       <?php  for($i=1;$i<=12;$i++){  ?>
                      	<option> <?php echo $i; ?></option>
                      <?php    }?>
                    </select>
                    <select>
                      <option>Year</option>
                       <?php  for($i=1900;$i<=2010;$i++){  ?>
                      	<option> <?php echo $i; ?></option>
                      <?php    }?>
                    </select>
                    
                 </td>
            </tr>
            
             <tr>
            	<td>Mobile Phone: </td>
                <td align="center"><input type="text" name="mobile"/></td>
            </tr>
             <tr>
            	<td>Home Phone: </td>
                <td align="center"><input type="text" name="homephone"/></td>
            </tr>
            
            <tr>
            	<td align="center" colspan="2"><button  type="button">Save</button></td>
            </tr>
        </table>
        </form>
		</div>
	</div>	
