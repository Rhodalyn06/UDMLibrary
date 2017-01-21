<?php
	include_once('../connection.php');
	$sql = $conn->query("SELECT * FROM haha");

	if (!$sql){

	}
	else{
		while(($row=$sql->fetch_assoc())==true){
			$fname = $row['fname'];
			$lname = $row['lname'];
			echo "<tr>";
			echo "<td>$fname</td>";
			echo "<td>$lname</td>";
			echo "</tr>";
		}
	}
?>