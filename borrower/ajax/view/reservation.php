<?php

	include_once('../session.php');
	include_once('../connection.php');
	

	$type=$_POST["type"];
	$filter=$_POST["type1"];
	$sql="";
	if ($type == "Title"){
		$sql = $conn->query("SELECT a.Title as Title, a.Edition as Edition, a.CallNo as CallNo,  a.Barcode as Barcode, b.ID as ID, a.Author as fname, a.LastName as lname, 
		a.First as subauthors, b.Status as Status, a.acquisitionId as AcquisitionId 
		FROM tb_acquisition a INNER JOIN tb_book b ON a.AcquisitionId = b.AcquisitionId WHERE a.Title like '%$filter%'");
	}
	else if ($type == "Author"){
		$sql = $conn->query("SELECT a.Title as Title, a.Edition as Edition, a.CallNo as CallNo, a.Barcode as Barcode, b.ID as ID, a.Author as fname, a.LastName as lname, 
		a.First as subauthors, b.Status as Status, a.acquisitionId as AcquisitionId 
		FROM tb_acquisition a INNER JOIN tb_book b ON a.AcquisitionId = b.AcquisitionId  WHERE a.Author like '%$filter%' or a.LastName 
		like '%$filter%' or First like '%$filter%'");
	}

	else if ($type == "Edition"){
		$sql = $conn->query("SELECT a.Title as Title, a.Edition as Edition, a.CallNo as CallNo, a.Barcode as Barcode, b.ID as ID, a.Author as fname, a.LastName as lname, 
		a.First as subauthors, b.Status as Status, a.acquisitionId as AcquisitionId 
		FROM tb_acquisition a INNER JOIN tb_book b ON a.AcquisitionId = b.AcquisitionId WHERE a.Edition like '%$filter%'");
	}

	else if ($type == "CallNo"){
		$sql = $conn->query("SELECT a.Title as Title, a.Edition as Edition, a.CallNo as CallNo, a.Barcode as Barcode, b.ID as ID, a.Author as fname, a.LastName as lname, 
		a.First as subauthors, b.Status as Status, a.acquisitionId as AcquisitionId 
		FROM tb_acquisition a INNER JOIN tb_book b ON a.AcquisitionId = b.AcquisitionId WHERE a.CallNo like '%$filter%'");
	}

	else if ($type=="Barcode"){
		$sql = $conn->query("SELECT a.Title as Title, a.Edition as Edition, a.CallNo as CallNo, a.Barcode as Barcode, b.ID as ID, a.Author as fname, a.LastName as lname, 
		a.First as subauthors, b.Status as Status, a.acquisitionId as acquisitionId 
		FROM tb_acquisition a INNER JOIN tb_book b ON a.AcquisitionId = b.AcquisitionId ");
	}


	if ($sql){
		while(($row=$sql->fetch_assoc())==true){
			$id = $row['ID'];
			$title = $row['Title'];
			$name = $row['fname'] . " " . $row['lname'] . ", " . $row['subauthors'];
			$edition = $row['Edition'];	
				$callno = $row['CallNo'];		
			$barcode = $row['Barcode'] . "-" . $row['ID'];
			$x = $row['Status'];
			
			

			echo "<tr onclick=\"reserve('$id')\">";
			echo "<td>$title</td>";
			echo "<td>$name</td>";
			echo "<td>$edition</td>";
			echo "<td>$callno</td>";
			echo "<td><span class='label label-info'>$x</span></td>";
			echo "</tr>";

		}
	}
?>