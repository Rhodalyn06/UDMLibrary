<?php
	$user = $_POST['type'];
	include_once('../connection.php');

	$sql = $conn->query("DELETE FROM temp_borrow WHERE ID ='$user'");

	if (!$sql){
		echo "Success!";
	}
	else{
		echo "";
	}
?>