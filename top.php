<body>
	
	<?php include("loggeduser.php");?>	
	<!--Message Displaying Start-->
	<?php
		if (isset($_SESSION['message'])):
	?>
		
	<div class="alert-<?=$_SESSION['msg_type']?>">
		
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	
	</div>
		
	<?php endif ?>
	<!--Message Displaying End-->
	
