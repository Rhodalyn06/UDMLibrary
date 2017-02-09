<?php
	$user = $_POST['type'];
	$type = $_POST['type1'];

	include_once('../connection.php');

	if ($type == "1"){
		$sql = $conn->query("UPDATE tb_users SET Active='0' WHERE UserName='$user'");
	}
	else{
		$sql = $conn->query("UPDATE tb_borrower SET Active='0' WHERE UserID='$user'");
	}
?>