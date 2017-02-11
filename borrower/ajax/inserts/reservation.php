<?php
	include_once("../connection.php");
	include_once('../session.php');
	$user = $_SESSION["id"];
	$id = $_REQUEST['type'];
	$date = date("Y-m-d H:i:s");
	$sql = $conn->query(
		"SELECT BorrowerID, BookOnHand FROM tb_borrower WHERE UserID = '$user'"
	);
	$row = $sql->fetch_assoc();

	$borrower = $row["BorrowerID"];
	$bookOnHand = $row["BookOnHand"];
	$bookLimit = 2;

	$sql = $conn->query("
		SELECT r2.ReservationID
		FROM tb_book b
		JOIN tb_book b2 ON b.AcquisitionID = b2.AcquisitionID AND b.ID != b2.ID
		JOIN tb_reservation r2 ON b2.ID = r2.BookID
		WHERE r2.BorrowerID='$borrower' AND b.ID='$id' AND r2.Status != 'Cancelled'
	");
	if (mysqli_num_rows($sql) || $bookOnHand >= $bookLimit) {
		echo "error";
	} else {
		$sql1 = $conn->query("
			SELECT * FROM tb_borrowandreturn
			WHERE
				AccessionID = '$id'
				AND ActualDateReturned = '0000-00-00'
		");

		$sql2 = $conn->query("
			SELECT * FROM tb_reservation
			WHERE
				BookID = '$id'
				AND Status = 'Reserved'
		");

		if (mysqli_num_rows($sql1) != 0 || mysqli_num_rows($sql2) != 0) {
			echo "Book Reserved";
		} else {
			$sql = $conn->query("
				INSERT into tb_reservation
				(
					BookID,
					BorrowerID,
					DateReserved,
					Status
				) VALUES (
					'$id',
					'$borrower',
					'$date',
					'Reserved'
				)"
			);

			if ($sql) {
				$sql = $conn->query(
					"UPDATE tb_book SET Status = 'Reserved' WHERE ID = '$id'"
				);

				if ($sql) {
					$sql = $conn->query("
						UPDATE tb_borrower
						SET BookOnHand = BookOnHand + 1
						WHERE BorrowerID = '$borrower'
					");
				}
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	}
?>
