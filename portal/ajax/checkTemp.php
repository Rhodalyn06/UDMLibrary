<?php
	include_once('connection.php');

	$sql = $conn->query("SELECT * FROM temp_return");

	if ($sql){
		if (mysqli_num_rows($sql)==0){
			echo false;
		}
		else{
			echo true;
		}
	}
	else{
		echo true;
	}
?>