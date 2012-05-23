<?php
	if(isset($getModuleTitle)):
		Application::$moduleTitle = "Add Category";
	else:
?>
<?php
	$addCategoryForm = new CategoryForm;
	if(isset($_SESSION['addCategoryForm']))
	{
		$addCategoryForm = unserialize($_SESSION['addCategoryForm']);
	}
?>
	<div id="content">
	<?php
		if(isset($_SESSION['addCategoryFormValidator']))
		{
			$addCategoryFormValidator = unserialize($_SESSION['addCategoryFormValidator']);
			
			//$loginFormValidator->runValidation();
			
			$addCategoryFormValidator->displayErrors(20);
		}
	?>
	<!-- login form -->
	<form id="login-form" class="forms" method="post" enctype="multipart/form-data" action="index.php?r=course&action=addCategory">
	<table align ="center">
		<tr>
			<td>Category Name: </td>
			<td align="center"><input type="text" name="name" value="<?php echo $addCategoryForm->name; ?>"/></td>
		</tr>
		
		<tr>
			<td>Description:</td>
			<td align="center"><textarea rows="5" cols="30" name="description" value="<?php echo $addCategoryForm->description; ?>"/></textarea> </td>
		</tr>
		  	
		 <tr>
			<td align="center"><button  type="submit" name="addCategory">Save</button> </td>
			<td align="center"><button  type="reset" name="reset">Reset</button></td>
		</tr>
		
	</table>
	</form>
	</div>
<?php
	if(isset($_SESSION['addCategoryForm']))
	{
		unset($_SESSION['addCategoryForm']);
	}
	if(isset($_SESSION['addCategoryFormValidator']))
	{
		unset($_SESSION['addCategoryFormValidator']);
	}
?>

<?php
	endif;
?>