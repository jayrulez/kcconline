<?php
	if(isset($getModuleTitle)):
		Application::$moduleTitle = "Search Courses";
	else:
?>
	<div id="content">
		<div>
			<form id="login-form" class="forms" method="get" enctype="multipart/form-data" action="index.php">
				
				<input type="hidden" name="r" value="course" />
				<input type="hidden" name="module" value="Courses" />
				<input type="hidden" name="action" value="searchCourse" />
				
				<table align ="center">
					<tr>
						<td>Course Code: </td>
						<td align="center"><input type="text" name="code" value="<?php echo (isset($_REQUEST['code'])) ? $_REQUEST['code'] : ""; ?>"/></td>
					</tr>
					   <tr>
						<td>Course Name: </td>
						<td align="center"><input type="text" name="name" value="<?php echo (isset($_REQUEST['name'])) ? $_REQUEST['name'] : ""; ?>"/></td>
					</tr>
					  <tr>
						<td>Category: </td>
						<td align="center">
							<select name="category">
							<option value="0" selected>Any</option>
							<?php 
								$categoryObj = new Category;
								$categories = $categoryObj->getAll();
								
								foreach($categories as $category)
								{
									$selected = "";
									if(isset($_REQUEST['category']))
									{
										if(strcmp($category['uid'],$_REQUEST['category'])==0)
										{
											$selected = "selected";
										}
									}
									echo '<option value="'.$category['uid'].'" '.$selected.'>'.$category['name'].'</option>';
								}
							?>
							</select>
						  </td>
					</tr>
					 <tr>
						<td align="center"><button  type="submit" name="">search</button> </td>
					</tr>
					
				</table>
			</form>
		</div>
		<div>
		<table>
		<?php
			if(isset($_REQUEST['action']) && (isset($_REQUEST['code']) || isset($_REQUEST['name']) || isset($_REQUEST['category'])))
			{
				$courseObj = new Course;
				$resultCourses = $courseObj->getAll();
				echo "<tr><th>Course Code</th><th>Course Name</th><th>Category</th><th></th><th></th><th></th></tr>";
				foreach($resultCourses as $courseRecord)
				{
					$categoryName = $courseRecord['categoryName'];
					if(empty($categoryName))
					{
						$categoryName = "None";
					}
					echo "<tr><td>".$courseRecord['course_code']."</td><td>".$courseRecord['name']."</td><td>".$categoryName.'</td><td><a href="">detail</a></td><td><a href="">update</a></td><td><a href="">remove</a></td></tr>';
				}
			}
		?>
		</table>
		</div>
	</div>
<?php
	endif;
?>