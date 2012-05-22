<?php
	$addUserForm = new AddUserForm;
	if(isset($_SESSION['addUserForm']))
	{
		$addUserForm = unserialize($_SESSION['addUserForm']);
	}
?>

	<div id="content">
	<?php
		if(isset($_SESSION['addUserFormValidator']))
		{
			$addUserFormValidator = unserialize($_SESSION['addUserFormValidator']);
			
			//$loginFormValidator->runValidation();
			
			$addUserFormValidator->displayErrors(20);
		}
	?>
	<form id="login-form" method="post" enctype="multipart/form-data" action="index.php?r=user&action=addUser">
	<table align ="center">
		<tr>
			<td>First Name: </td>
			<td align="center"><input type="text" name="firstName" value="<?php echo $addUserForm->firstName; ?>"/></td>
		</tr>
		   <tr>
			<td>Middle Name: </td>
			<td align="center"><input type="text" name="middleName" value="<?php echo $addUserForm->middleName; ?>"/></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td align="center"><input type="passwordd" name="lastName" value="<?php echo $addUserForm->lastName; ?>"/></td>
		</tr>
		<tr>
			<td>Gender:</td>
			<td align="center"> <input type="radio" name="gender" value="M" /> Male <input type="radio" name="gender" value="F" /> Female</td>
		</tr>
		  <tr>
			<td>Street: </td>
			<td align="center"><input type="text" name="street" value="<?php echo $addUserForm->street; ?>"/></td>
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
						$selected = "";
	
						if(strcmp($country['code'],"JM")==0)
						{
							$selected = "selected";
						}
						if(strcmp($country['code'],$addUserForm->country)==0)
						{
							$selected = "selected";
						}
						echo '<option value="'.$country['code'].'" '.$selected.'>'.$country['country'].'</option>';
					}
				?>
				</select>
			</td>
		</tr>
		  <tr>
			<td>ID Number: </td>
			<td align="center"><input type="text" name="idNumber" value="<?php echo $addUserForm->idNumber; ?>"/></td>
		</tr>
		  <tr>
			<td>Email: </td>
			<td align="center"><input type="text" name="emailAddress" value="<?php echo $addUserForm->emailAddress; ?>"/></td>
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
			<td align="center"><input type="text" name="mobilePhone" value="<?php echo $addUserForm->mobilePhone; ?>"/></td>
		</tr>
		 <tr>
			<td>Other Phone: </td>
			<td align="center"><input type="text" name="otherPhone"  value="<?php echo $addUserForm->otherPhone; ?>"/></td>
		</tr>
		<tr>
			<td>Profile Image:</td><td><input type="file" name="profilePhoto"/></td>
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
						$selected = "";
	
						if(strcmp($country['code'],"JM")==0)
						{
							$selected = "selected";
						}
						if(strcmp($country['code'],$addUserForm->country)==0)
						{
							$selected = "selected";
						}
						echo '<option value="'.$country['code'].'" '.$selected.'>'.$country['country'].'</option>';
					}
				?>
				</select>
			</td>
		</tr>
	
		<tr>
			<td align="center" colspan="2"><input  type="checkbox" name="activate" value="1"/>Active Account</td>
		</tr>
		<tr>
			<td align="center" colspan="2"><button  type="submit" name="addUser">Save</button></td>
		</tr>
		
	</table>
	</form>
	</div>	
<?php
	if(isset($_SESSION['addUserForm']))
	{
		unset($_SESSION['addUserForm']);
	}
	if(isset($_SESSION['addUserFormValidator']))
	{
		unset($_SESSION['addUserFormValidator']);
	}
?>
