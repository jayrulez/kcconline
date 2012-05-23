<?php
	if(isset($getModuleTitle)):
		Application::$moduleTitle = "Search Categories";
	else:
?>
	<div id="content">
		<div>
			<form id="login-form" class="forms" method="get" enctype="multipart/form-data" action="index.php">
				
				<input type="hidden" name="r" value="course" />
				<input type="hidden" name="module" value="Courses" />
				<input type="hidden" name="action" value="searchCategory" />
				
				<table align ="center">
					<tr>
						<td>Category Code: </td>
						<td align="center"><input type="text" name="code" value="<?php echo (isset($_REQUEST['code'])) ? $_REQUEST['code'] : ""; ?>"/></td>
					</tr>
					   <tr>
						<td>Course Name: </td>
						<td align="center"><input type="text" name="name" value="<?php echo (isset($_REQUEST['name'])) ? $_REQUEST['name'] : ""; ?>"/></td>
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
			if(isset($_REQUEST['action']) && (isset($_REQUEST['code']) || isset($_REQUEST['name'])))
			{
				$categoryObj = new Category;
				$resultCategory = $categoryObj->getAll();
				echo "<tr><th>Category Code</th><th>Category Name</th><th></th><th></th><th></th></tr>";
				foreach($resultCategory as $categoryRecord)
				{
					echo "<tr><td>".$categoryRecord['uid']."</td><td>".$categoryRecord['name'].'</td><td><a href="">detail</a></td><td><a href="">update</a></td><td><a href="">remove</a></td></tr>';
				}
			}
		?>
		</table>
		</div>
	</div>
<?php 
	endif;
?>