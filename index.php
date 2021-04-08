<?php session_start(); $_SESSION['UID'] = $_SESSION['UName'] = ""; ?>
<?php include('header.php'); ?>
<body class="Page-01">
		<div class="Login">
			<h2>Login</h2>
			<form method="POST" action="login.php">
				<div class="InputBox">
					<input type="text" name="Username" required="">
					<label>Username</label>
				</div>
				<div class="InputBox">
					<input type="password" name="Password" required="">
					<label>Password</label>
				</div>
				<input type="submit" name="SignIn" value="Sign in">
			</form>
		</div>
</body>
</html>
