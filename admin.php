<?php session_start();?>

<?php include("connection.php"); ?>

<?php include("process.php");?>

<?php include("header.php");?>

<?php $currentPage = "Users"; ?>

<?php include("navbar.php"); ?>

<?php include("top.php"); ?>
	
<?php if (!empty($_SESSION['UID'])):?>

	<div class="Container">
		
		<?php 
			//sql query
			$Command="SELECT * FROM users"; 
				
			//running sql query and reading results from the database.
			$Result = $Connection->query($Command);
		?>
		
		<!--Displaying Users List Start-->		
		<div class="row justify">
		
			<table class="Table-Center">
				<thead>
					<tr>
						<th>ID</th>
						<th>User Name</th>
						<th>Login Name</th>
						<th>Password</th>
						<th>Privilege</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
					
				<!--Displaying data while reading from Result array-->
				<?php while($Row=$Result->fetch_assoc()): ?>

					<tr>
						<td><?php echo $Row['UserId']; ?></td>
						<td><?php echo $Row['UserName']; ?></td>
						<td><?php echo $Row['LoginName']; ?></td>
						<td><?php echo $Row['Password']; ?></td>
						<td><?php echo $Row['Privilege']; ?></td>
						
						<td class="action"> 
							<a href="admin.php?EditUser=<?php echo $Row['UserId']; ?>" class="btn-info"> Edit </a> 
							<a href="process.php?DeleteUser=<?php echo $Row['UserId']; ?>" class="btn-danger"> Delete </a>
						</td>
					</tr>

				<?php 
					endwhile; 
				?>

			</table>

		</div>
		<!--Displaying Users List End-->
	
	
	
		<!--Saving user Form Start-->
		<div class="AddUser">
			
			<h2>Add User</h2>
				
			<form method="POST" action="process.php" class="form" onSubmit="return checkform()">
				
				<!--Values are reading dynamically to use editing option-->
				<input type="hidden" name="UID" value="<?php echo $UserID; ?>">
					
				<div class="InputBox">
					<label>Name</label>
					<input type="text" name="UserName" value="<?php echo $UserName; ?>" class="TextBox">
				</div>
					
				<div class="InputBox">
					<label>Login Name</label>
					<input type="text" name="LoginName" value="<?php echo $LoginName; ?>" class="TextBox">
				</div>

				<div class="InputBox">
					<label>Password</label>
					<input type="password" name="Password" value="<?php echo $Password; ?>" class="TextBox">
				</div>

				<div class="RadGroup">
					<input type="radio" name="Privilege" value="Administrator" <?php echo ($Privilege=='Administrator')?'checked':'' ?>>Administrator</input>
					<input type="radio" name="Privilege" value="Student" <?php echo ($Privilege=='Student')?'checked':'' ?>>Student</input>
				
				<!--Changing the button for saving and editing-->
				<?php if($Update==true): ?>
					<input type="submit" name="UpdateUser" value="Update" class="btn-submit">
				<?php else: ?>	
					<input type="submit" name="AddUser" value="Add" class="btn-submit">
				<?php endif;?>	
				</div>
			</form>
				
		</div>
		<!--Saving user Form end-->
		
	</div>

<?php endif?>
	
<?php include("footer.php"); ?>