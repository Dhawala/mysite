<?php session_start();?>

<?php include("connection.php"); ?>

<?php include("process.php");?>

<?php include("header.php"); ?>

<?php $currentPage="Results"; ?>

<?php include("navbar.php"); ?>

<?php include("top.php"); ?>

<?php if (!empty($_SESSION['UID'])):?>
		
	<div class="Container">
		
		<?php 
			//sql query
			$Command="SELECT * FROM users WHERE Privilege='Student'"; 
				
			//running sql query and reading results from the database.
			$Result = $Connection->query($Command);
		?>

		<!--Displaying Marks Start-->	
		<div class="row justify">

			<table class="Table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Web Programming</th>
						<th>Java Programming</th>
						<th>Mobile App Development</th>
						<th>Action</th>
					</tr>
				</thead>
							
				<!--Displaying data while reading from Result array-->
				<?php while($Row=$Result->fetch_assoc()): ?>
				
					<tr>
						<td><?php echo $Row['UserName']; ?></td>
						<td><?php echo $Row['Web']; ?></td>
						<td><?php echo $Row['Java']; ?></td>
						<td><?php echo $Row['Mobile']; ?></td>
							
						<td> 
							<a href="results.php?EditMarks=<?php echo $Row['UserId']; ?>" class="btn btn-info"> Edit </a> 
						</td>
					</tr>
						
				<?php 
					endwhile; 
				?>
				
			</table>
					
		</div>
		<!--Displaying Marks End-->
			
			
			
		<!--Adding Marks Form Start-->
		<div class="AddMarks">
				
			<h2>Update Results</h2>
				
			<form method="POST" action="process.php" class="form-container" onSubmit="return checkform()">
				
				<h2> <?php echo $UserName; ?> </h2>

				<input type="hidden" name="M_UID" value="<?php echo $UserID; ?>">
					
				<div class="InputBox">
					<label> Web Programming </label>
					<input type="text" placeholder="<?php echo $Web; ?>" name="Web" class="TextBox">
				</div>
					
				<div class="InputBox">
					<label> Java Programming </label>
					<input type="text" placeholder="<?php echo $Java; ?>" name="Java" class="TextBox">
				</div>
					
				<div class="InputBox">
					<label> Mobile App Development </label>
					<input type="text" placeholder="<?php echo $Mobile; ?>" name="Mobile" class="TextBox">
				</div>
					
				<input type="submit" name="UpdateMarks" value="Update" id="Marks-Submit">

			</form>
		</div>
		<!--Adding Marks Form end-->
			
	</div>
	
<?php endif?>

<?php include("footer.php"); ?>