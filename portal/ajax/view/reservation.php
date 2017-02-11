<?php


	include_once('../connection.php');

	$sql = $conn->query("
		SELECT
			b.AcquisitionId as AcquisitionId,
			d.UserID as BorrowerID,
			d.FirstName as fname,
			d.LastName as lname,
			b.Title as Title,
			a.Status as Status,
			a.ReservationID as ID,
			(a.DateReserved + INTERVAL 1 DAY < NOW()) as overdue
	FROM tb_reservation a
	INNER JOIN tb_book c ON a.BookID = c.ID
	INNER JOIN tb_acquisition b ON c.AcquisitionId = b.AcquisitionId
	INNER JOIN tb_borrower d ON d.BorrowerID = a.BorrowerID
	WHERE
		a.Status = 'Reserved'
	ORDER BY
		a.DateReserved ASC
	");
	if ($sql) {
		while(($row=$sql->fetch_assoc())==true) {
			$id = $row['ID'];
			$title = $row['Title'];
			$name = $row['fname'] . " " . $row['lname'];
			$borrowerID = $row['BorrowerID'];
			$status = $row['overdue'] ? 'Overdue' : $row['Status'];

			echo '<tr data-id="' . $id . '" class="' . ($row['overdue'] ? 'danger overdue' : '' ) . '">';
			echo "<td>$borrowerID</td>";
			echo "<td>$name</td>";
			echo "<td>$title</td>";
			echo "<td><span class='label label-" . ($row['overdue'] ? 'danger' : 'primary') . "'>$status</span></td>";
			echo "<td>";
			if (!$row['overdue']) {
				echo "<a href='#' onclick='claims({$id})'>Claim</a> |";
			}
			echo "<a href='#' onclick='confirmClearReservation({$id})'>Cancel</a>";
			echo "</td></tr>";

		}
	}
?>
