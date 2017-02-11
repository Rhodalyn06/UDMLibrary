<?php

	include_once('../session.php');
	include_once('../connection.php');
	$z = $_SESSION['id'];

	$sql = $conn->query("
		SELECT
			a.ReservationID,
			b.AcquisitionId as acquisitionId,
			d.UserID as BorrowerID,
			d.FirstName as fname,
			d.LastName as lname,
			b.Title as Title,
			a.Status as Status,
			a.DateReserved as DateReserved,
			(a.DateReserved + INTERVAL 1 DAY < NOW()) as overdue
		FROM tb_reservation a
		INNER JOIN tb_book c ON a.BookID = c.ID
		INNER JOIN tb_acquisition b ON c.AcquisitionId = b.AcquisitionId
		INNER JOIN tb_borrower d ON d.BorrowerID = a.BorrowerID
		WHERE d.UserID = '$z'
		ORDER BY a.ReservationID DESC
	");


	if ($sql) {

		while(($row=$sql->fetch_assoc())==true){
			$id = $row['acquisitionId'];
			$title = $row['Title'];
			$name = $row['fname'] . " " . $row['lname'];
			$borrowerID = $row['BorrowerID'];
			$x = $row['Status'];
			$dateReserve = $row["DateReserved"];


			echo "<tr>";

			echo "<td>$title</td>";
			echo "<td>$x</td>";
			echo "<td>$dateReserve</td>";
			echo '<td>';
			if ($row['Status'] == 'Reserved') {
				echo "<a href='#' onclick='confirmClearReservation({$row['ReservationID']})'>Cancel</a>";
			}
			echo '</td>';

			echo "</tr>";

		}
	} else {
		echo mysqli_error($conn);
	}
?>
