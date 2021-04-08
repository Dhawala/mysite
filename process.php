<?php
//calling connection.php to work with database.
include("connection.php");
?>



<!--User Management Section-->



<?php
//declaring some variables. otherwise an error will be shown.
$Update = false;
$UserID = "";
$UserName = "";
$LoginName = "";
$Password = "";
$Privilege = "Student";
$Web = "Enter Marks";
$Java = "Enter Marks";
$Mobile = "Enter Marks";
		
//Adding user.
if(isset($_POST['AddUser']))
{
	$Row = mysqli_fetch_row($Connection->query("SELECT IFNULL( MAX(UserId), 0)+1 AS New_ID from users"));
	
	$UserID=$Row[0];
	$UserName = $_POST['UserName'];
	$LoginName = $_POST['LoginName'];
	$Password = $_POST['Password'];
	$Privilege = $_POST['Privilege'];

	if($Privilege=="Administrator")
	{
		$Marks = "NA";
	}
	else
	{
		$Marks = "Pending";
	}
	
	$Command="INSERT INTO users VALUES ($UserID,'$UserName','$LoginName','$Password','$Privilege','$Marks','$Marks','$Marks')";
	
	if($Connection->query($Command)===true)
		{
			$_SESSION['message'] = "User has been saved.";
			$_SESSION['msg_type'] = "success";
		}
	else
		{
			$_SESSION['message'] = "&#9888; User cannot be saved: " . $Connection->error;
			$_SESSION['msg_type'] = "danger";
		}
	header("location:admin.php");
	
	
}

//Updating user.
if(isset($_POST['UpdateUser']))
{
	$UID = $_POST['UID'];
	$UserName = $_POST['UserName'];
	$LoginName = $_POST['LoginName'];
	$Password = $_POST['Password'];
	$Privilege = $_POST['Privilege'];
	
	$Command="UPDATE users SET UserName='$UserName',LoginName='$LoginName',Password='$Password',Privilege='$Privilege' WHERE UserId='$UID'";	

	if($Connection->query($Command)===true)
		{
			$_SESSION['message'] = "User has been updated.";
			$_SESSION['msg_type'] = "success";
		}
	else
		{
			$_SESSION['message'] = "&#9888;  User cannot be updated: " . $Connection->error;
			$_SESSION['msg_type'] = "danger";
		}
	header("location:admin.php");
}

//Deleting user
if(isset($_GET['DeleteUser']))
{
	$ID = $_GET['DeleteUser'];
	$Command="DELETE FROM users WHERE UserId=$ID";
	$Opt="OPTIMIZE TABLE users";
	
	if($Connection->query($Command)===true)
		{
			$_SESSION['message'] = "User has been removed.";
			$_SESSION['msg_type'] = "success";
			$Connection->query($Opt);
		}
	else
		{
			$_SESSION['message'] = "&#9888;  User cannot be removed: " . $Connection->error;
			$_SESSION['msg_type'] = "danger";
		}
	header("location:admin.php");
}

//Loading relevent data to edit.
if(isset($_GET['EditUser']))
{
	$ID = $_GET['EditUser'];
	$Update = true;
	$Command="SELECT * FROM users WHERE UserId=$ID";
	$Result = $Connection->query($Command);	
	
	if($Row=$Result->fetch_assoc())
		{	
			$UserID = $ID;
			$UserName = $Row['UserName']; 
			$LoginName = $Row['LoginName'];
			$Password = $Row['Password']; 
			$Privilege = $Row['Privilege']; 
		}	
}
?>



<!--Results Management Section-->
<?php

if(isset($_POST['UpdateMarks']))
{
	$UserID = $_POST['M_UID'];
	$Web = $_POST['Web'];
	$Java = $_POST['Java'];
	$Mobile = $_POST['Mobile'];

	$Command="UPDATE users SET Web='$Web',Java='$Java',Mobile='$Mobile' WHERE UserId='$UserID'";
	
	if($Connection->query($Command)===true)
		{
			$_SESSION['message'] = "Results has been updated.";
			$_SESSION['msg_type'] = "success";
		}
	else
		{
			$_SESSION['message'] = "&#9888;   Results cannot be updated: " . $Connection->error;
			$_SESSION['msg_type'] = "danger";
		}
	header("location:results.php");

}


//Loading relevent data to edit.
if(isset($_GET['EditMarks']))
{
	$ID = $_GET['EditMarks'];
	$Update = true;
	$Command="SELECT UserName,Web,Java,Mobile FROM users WHERE UserId=$ID";
	$Result = $Connection->query($Command);	
	
	if($Row=$Result->fetch_assoc())
		{	
			$UserID = $ID;
			$UserName = $Row['UserName'];
			$Web = $Row['Web'];
			$Java = $Row['Java'];
			$Mobile = $Row['Mobile'];
		}	
	
}
?>