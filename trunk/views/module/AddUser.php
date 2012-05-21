
	<div id="content">
	<!-- login form -->
	<form id="login-form" method="post" action="index.php?r=user&action=addUser">
	<table align ="center">
		<tr>
			<td>First Name: </td>
			<td align="center"><input type="text" name="firstName"/></td>
		</tr>
		   <tr>
			<td>Middle Name: </td>
			<td align="center"><input type="text" name="middleName"/></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td align="center"><input type="passwordd" name="lastName"/></td>
		</tr>
		  <tr>
			<td>Street: </td>
			<td align="center"><input type="text" name="street"/></td>
		</tr>
		  <tr>
			<td>Country: </td>
			<td align="center">
				<select name="country">
				<?php 
					$countryObj = new Country;
					$countries = $countryObj->getAll();
					
					foreach($countries as $country)
					{
						echo '<option value="'.$country['code'].'">'.$country['country'].'</option>';
					}
				?>
				</select>
			  </td>
		</tr>
		  <tr>
			<td>ID Number: </td>
			<td align="center"><input type="text" name="idNumber"/></td>
		</tr>
		  <tr>
			<td>Email: </td>
			<td align="center"><input type="text" name="emailAddress"/></td>
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
			<td align="center"><input type="text" name="mobilePhone"/></td>
		</tr>
		 <tr>
			<td>Home Phone: </td>
			<td align="center"><input type="text" name="homePhone"/></td>
		</tr>
		
		<tr>
			<td align="center" colspan="2"><button  type="button">Save</button></td>
		</tr>
	</table>
	</form>
	</div>	
