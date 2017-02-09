<?php
	include_once("../connection.php");
	include_once("../session.php");
	$oldPass = $_POST['type'];
	$user = $_SESSION['id'];

	$sql = $conn->query("SELECT * FROM tb_accounts WHERE UserID ='$user' and Password ='$oldPass'");

	if ($sql){
		if (mysqli_num_rows($sql)==0){
			echo false;
		}
		else{
			$new = $_POST['type1'];
			$sql = $conn->query("UPDATE tb_accounts SET Password='$new' WHERE UserID='$user'");
			if ($sql){
				$sql = $conn->query("UPDATE tb_users SET Password='$new' WHERE UserName='$user'");
				if ($sql){
					echo true;
				}
			}
		}
	}
	else{
		echo false;
	}
?>