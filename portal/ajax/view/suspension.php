<?php
	include_once("../connection.php");
	$sql = $conn->query("Select * FROM tb_holidays");

	while (($row=$sql->fetch_assoc())==true){
		$holidayName = $row['HolidayName'];
		$holidayId = $row['id'];
		$holidayDate = $row['HolidayDate'];

		echo "<tr onclick = \"editDetails('$holidayId')\">";
		echo "<td>$holidayName</td>";
		echo "<td>$holidayDate</td>";
		echo "</tr>";
	}
	
?>