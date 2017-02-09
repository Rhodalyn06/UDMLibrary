<?php

	
	include_once('../connection.php');

	$sql = $conn->query("SELECT b.AcquisitionId as AcquisitionId, d.UserID as BorrowerID, d.FirstName as fname,
		d.LastName as lname, b.Title as Title, a.Status as Status, a.ReservationID as ID 
		FROM tb_reservation a 
		 
		INNER JOIN tb_book c ON a.BookID = c.ID 
		INNER JOIN tb_acquisition b ON c.AcquisitionId = b.AcquisitionId
		INNER JOIN tb_borrower d ON d.BorrowerID = a.BorrowerID Where a.Status='Reserved'");

	if ($sql){
		while(($row=$sql->fetch_assoc())==true){
			$id = $row['ID'];
			$title = $row['Title'];
			$name = $row['fname'] . " " . $row['lname'];
			$borrowerID = $row['BorrowerID'];
			$x = $row['Status'];
			

			echo "<tr onclick=\"claims('$id')\">";
			echo "<td>$borrowerID</td>";
			echo "<td>$name</td>";
			echo "<td>$title</td>";
			echo "<td><span class='label label-primary'>$x</span></td>";
			echo "</tr>";

		}
	}
?>