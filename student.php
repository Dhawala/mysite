<?php session_start();?>

<?php include("connection.php"); ?>
	
<?php include("header.php"); ?>

<body>

<div class="topnav">
	<div class="topnav-right">
		<a href="logout.php" class="logout">Log out</a>
	</div>
</div>

<?php if (!empty($_SESSION['UID'])):?>

	<div class="Container">
		
		<?php 
			$ID = $_SESSION['UID'];
			
			//sql query
			$Command="SELECT UserName,Web,Java,Mobile FROM users WHERE UserId=$ID"; 
				
			//running sql query and reading results from the database.
			$Result = $Connection->query($Command);
		?>

		<div class="Welcome">
			<h2>Hello <?php echo $_SESSION['UName'];?> !</h2>		
			<span>welcome to the "Online Exams" student portal. Check your exam results here. </span>
		</div>
			
		<div class="Student-Table">
				
			<!--Displaying data while reading from Result array-->
			<?php while($Row=$Result->fetch_assoc()): ?>
	
			<table class="Table">
				<thead>
					<tr>
						<th>Subject</th>
						<th>Marks</th>
					</tr>
				</thead>
					
				<tr>
					<td>Web Programming</td>
					<td><?php echo $Row['Web']; ?></td>
				</tr>
						
				<tr>
					<td>Java Programming</td>
					<td><?php echo $Row['Java']; ?></td>
				</tr>
						
				<tr>	
					<td>Mobile App Development</td>
					<td><?php echo $Row['Mobile']; ?></td>
				</tr>

				<?php 
					endwhile; 
				?>

			</table>
				
		</div>

		<div class="Welcome">
			<span>Thank you for choosing "Online Exams".</span>
		</div>
		
	</div>
	
<?php endif?>
	
<?php include("footer.php"); ?>
