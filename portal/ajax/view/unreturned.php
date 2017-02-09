<?php
	include_once("../connection.php");

	$sql = $conn->query("SELECT a.Barcode as Barcode, a.Title as Title, b.ID as ID, c.DateBorrowed as DateBorrowed, 
		d.FirstName as fname, d.LastName as lname FROM tb_borrowandreturn c INNER JOIN tb_book b ON c.AccessionID = b.ID 
		INNER JOIN tb_acquisition a ON a.acquisitionId = b.acquisitionId INNER JOIN tb_borrower d ON c.BorrowerID = d.BorrowerID 
		WHERE c.ActualDateReturned = '0000-00-00'");

	if ($sql){
		while(($row=$sql->fetch_assoc())==true){
			$barcode = $row['Barcode'] . "-" . $row["ID"];
			$title = $row['Title'];
			$bDate = $row['DateBorrowed'];
			$borrower = $row['fname'] . " " . $row['lname'];

			echo "<tr>";
			echo "<td>$barcode</td>";
			echo "<td>$title</td>";
			echo "<td>$bDate</td>";
			echo "<td>$borrower</td>";
			echo "</tr>";
		}
	}
?>