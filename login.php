<?php session_start();?>

<?php
include("connection.php");

if (isset($_POST['SignIn']))
{
	$Uname = $_POST['Username'];
	$Pass = $_POST['Password'];
	
	if(empty($Uname)||empty($Pass))
	{
		$_SESSION['login'] = "Please enter Username and Password";
		$_SESSION['msg_type'] = "danger";
	}
	else
	{
		$Command="SELECT * FROM users WHERE LoginName='$Uname'"; 
		$Result=$Connection->query($Command);

		if($Row=$Result->fetch_assoc())
		{
			$DB_Pass = $Row['Password'];
			
			if($Pass == $DB_Pass)
			{
				switch ($Row['Privilege']) 
				{
					case "Administrator":
						{
							$_SESSION['UID'] = $Row['UserId'];
							$_SESSION['UName'] = $Row['UserName'];
							header("location:admin.php");
							
						}
							break;
					case "Student":
						{
							$_SESSION['UID'] = $Row['UserId'];
							$_SESSION['UName'] = $Row['UserName'];
							header("location:student.php");
						}
							break;
				}
			}
			else
			{
				$_SESSION['login'] = "Incorrect Password";
				$_SESSION['msg_type'] = "danger";
				header("location:index.php");
			}
		}
		else
		{
			$_SESSION['login'] = "Invalid Query";
			$_SESSION['msg_type'] = "danger";
			header("location:index.php");
		}
	}
}

$Connection->close();

?>