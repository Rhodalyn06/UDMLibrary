<?php
	include_once("../connection.php");
	$sql = $conn->query("Select a.day as day, a.login as log, b.FirstName as fname,  b.LastName as lname, a.userid as user FROM tb_audittrail a INNER JOIN tb_borrower b ON a.userid = b.UserID");

	while (($row=$sql->fetch_assoc())==true){
		$user = $row['user'];
		$day = $row['day'];
		$login = $row['log'];
		$name = $row['fname'] . " " . $row['lname'];

		echo "<tr>";
		echo "<td>$user</td>";
		echo "<td>$name</td>";
		echo "<td>$day</td>";

		echo "<td>$login</td>";
		echo "</tr>";
	}
	
?>