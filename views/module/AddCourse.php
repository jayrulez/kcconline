<?php
	$addCourseForm = new CourseForm;
	if(isset($_SESSION['addCourseForm']))
	{
		$addCourseForm = unserialize($_SESSION['addCourseForm']);
	}
?>
	<div id="content">
	<?php
		if(isset($_SESSION['addCourseFormValidator']))
		{
			$addCourseFormValidator = unserialize($_SESSION['addCourseFormValidator']);
			
			//$loginFormValidator->runValidation();
			
			$addCourseFormValidator->displayErrors(20);
		}
	?>
	<!-- login form -->
	<form id="login-form" class="forms" method="post" enctype="multipart/form-data" action="index.php?r=course&action=addCourse">
	<table align ="center">
		<tr>
			<td>Course Code: </td>
			<td align="center"><input type="text" name="courseCode" value="<?php echo $addCourseForm->courseCode; ?>"/></td>
		</tr>
		   <tr>
			<td>Course Name: </td>
			<td align="center"><input type="text" name="courseName" value="<?php echo $addCourseForm->courseName; ?>"/></td>
		</tr>
		<tr>
			<td>Description:</td>
			<td align="center"><textarea rows="5" cols="30" name="description" value="<?php echo $addCourseForm->description; ?>"/></textarea> </td>
		</tr>
		  <tr>
			<td>Category: </td>
			<td align="center">
				<select name="category">
				<option value="0" selected>None</option>
				<?php 
					$courseObj = new Course;
					$courses = $courseObj->getAll();
					
					foreach($courses as $course)
					{
						$selected = "";
						if(strcmp($course['course_code'],$addCourseForm->category)==0)
						{
							$selected = "selected";
						}
						echo '<option value="'.$course['course_code'].'" '.$selected.'>'.$course['name'].'</option>';
					}
				?>
				</select>
			  </td>
		</tr>
		</tr>
		   <tr>
			<td> </td>
			<td align="center"><input type="checkbox" name="keyRequired" value="<?php echo $addCourseForm->keyRequired; ?>"/>  Key Required</td>
		</tr>			  
		</tr>
		   <tr>
			<td>Enrollment Key: </td>
			<td align="center"><input type="password" name="enrollmentKey"/></td>
		</tr>		
		 <tr>
			<td align="center"><button  type="submit" name="addCourse">Save</button> </td>
			<td align="center"><button  type="reset" name="reset">Reset</button></td>
		</tr>
		
	</table>
	</form>
	</div>
<?php
	if(isset($_SESSION['addCourseForm']))
	{
		unset($_SESSION['addCourseForm']);
	}
	if(isset($_SESSION['addCourseFormValidator']))
	{
		unset($_SESSION['addCourseFormValidator']);
	}
?>