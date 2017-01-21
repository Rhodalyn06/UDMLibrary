<?php
	include_once('../connection.php');

	$userid = $_POST['type'];
	$fname = $_POST['type1'];
	$lname = $_POST['type2'];
	$type = $_POST['type3'];

	if ($type == "1"){
		$sql=$conn->query("UPDATE tb_users SET FirstName='$fname', 
			 LastName='$lname' WHERE UserName='$userid'");
	}
	else if ($type=="2"){
		$btype = $_POST['type4'];
		$address = $_POST['type5'];
	
		$contactnum = $_POST['type6'];
		$bday = $_POST['type7'];
		$middilename = $_POST['type8'];
		$sql=$conn->query("UPDATE tb_borrower SET FirstName='$fname',
												  LastName='$lname',
												  BorrowerType='$btype',
												  Address='$address',
												  ContactNo = '$contactnum', 
												  Birthday='$bday',
												  middilename = '$middilename'
												  WHERE UserID='$userid'");
	}
?>