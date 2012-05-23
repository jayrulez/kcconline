<?php
	if(isset($getModuleTitle)):
		Application::$moduleTitle = "Search Users";
	else:
?>
	<div id="content">
		<div>
			<form id="login-form" class="forms" method="get" enctype="multipart/form-data" action="index.php">
				
				<input type="hidden" name="r" value="user" />
				<input type="hidden" name="module" value="Users" />
				<input type="hidden" name="action" value="searchUser" />
				
				<table align ="center">
					<tr>
						<td>Id Number: </td>
						<td align="center"><input type="text" name="code" value="<?php echo (isset($_REQUEST['id'])) ? $_REQUEST['id'] : ""; ?>"/></td>
					</tr>
					<tr>
						<td>Email Address: </td>
						<td align="center"><input type="text" name="name" value="<?php echo (isset($_REQUEST['email'])) ? $_REQUEST['email'] : ""; ?>"/></td>
					</tr>
					  <tr>
						<td>Role: </td>
						<td align="center">
							<select name="role">
							<option value="0" selected>Any</option>
							<?php 
								$roleObj = new Role;
								$roles = $roleObj->getAll();
								
								foreach($roles as $role)
								{
									$selected = "";
									if(isset($_REQUEST['role']))
									{
										if(strcmp($role['uid'],$_REQUEST['role'])==0)
										{
											$selected = "selected";
										}
									}
									echo '<option value="'.$role['uid'].'" '.$selected.'>'.$role['name'].'</option>';
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
			if(isset($_REQUEST['action']) && (isset($_REQUEST['id']) || isset($_REQUEST['email']) || isset($_REQUEST['role'])))
			{
				$userObj = new User;
				$resultUser = $userObj->getAll();
				echo "<tr><th>User's Name</th><th>Id Number</th><th>Email Address</th><th></th><th></th><th></th></tr>";
				foreach($resultUser as $userRecord)
				{
					$userName = $userRecord['first_name']." ".$userRecord['last_name'];

					echo "<tr><td>".$userName."</td><td>".$userRecord['user_id']."</td><td>".$userRecord['email_address'].'</td><td><a href="">detail</a></td><td><a href="">update</a></td><td><a href="">remove</a></td></tr>';
				}
			}
		?>
		</table>
		</div>
	</div>
<?php
	endif;
?>