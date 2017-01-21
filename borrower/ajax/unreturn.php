<?php
	include_once('../session.php');
	
	include_once('../connection.php');
	$z = $_SESSION['id'];

	$sql = $conn->query("SELECT b.AcquisitionId as acquisitionId, 
		b.Barcode as Barcode, 
		b.Title as Title, 
		a.DateBorrowed as DateBorrowed, 
		a.ActualDateReturned as ActualDateReturned 
		FROM tb_borrowandreturn a 
		INNER JOIN tb_book d ON a.AccessionID = d.ID
		INNER JOIN tb_acquisition b ON d.AcquisitionId = b.AcquisitionId
		INNER JOIN tb_borrower c ON c.BorrowerID = a.BorrowerID 
		WHERE c.UserID='$z' WHERE a.ActualDateReturned='0000-00-00'");
	
	if ($sql){
		while(($row=$sql->fetch_assoc())==true){
			$id = $row['acquisitionId'];
			$title = $row['Title'];
			$DateBorrowed = $row['DateBorrowed'];
			$barcode = $row['Barcode'];
			
			

			echo "<tr onclick=\"viewbook('$id')\">";
			echo "<td>$barcode</td>";
			echo "<td>$title</td>";
			echo "<td>$DateBorrowed</td>";
			echo "</tr>";

		}
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?>