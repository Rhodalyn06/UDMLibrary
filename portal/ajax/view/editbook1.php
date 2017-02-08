<?php
	include_once('../connection.php');
	$id = $_POST['type'];
	$sql1 = $conn->query("DELETE FROM hahax");
	$sql = $conn->query("SELECT * FROM tb_acquisition WHERE AcquisitionId ='$id'");

	$row = $sql->fetch_assoc();
	$barcode = $row['Barcode'];
	$title = $row['Title'];
	$fname = $row["Author"];
	$lname = $row['Lastname'];
	$copyright = $row['CopyRight'];
	$copy = $row['NoOfCopies'];
	$edition = $row['Edition'];
	$callno = $row['CallNo'];
	$method = $row['AcquisitionMet'];
	$price = $row['Price'];
	$bkcateg = $row['Category'];
	$accno = $row['AccessionNum'];
	$pubb = $row['Publisher'];


	$sql = $conn->query("SELECT * FROM tb_book WHERE AcquisitionId='$id'");

	$row = $sql->fetch_assoc();

	$isbn = $row['ISBN'];
	$sub = $row['SubAuthors'];
	$desk = $row['Description'];
	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Barcode</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$barcode\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Acquisition ID</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$id\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Call Number</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$callno\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Title</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$title\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Author's Last name</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$lname\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Author's First Name</label>";
	echo "<input class=\"form-control\"  style=\"width:40%;font-size:15px;\" value=\"$fname\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Sub Authors</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$sub\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Edition</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$edition\" disabled/>";
	echo "</div>";


	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Publisher</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$pubb\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Copyright</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$copyright\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Number of Copies</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$copy\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">ISBN</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$isbn\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Acquisition Method</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$method\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Price</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$price\" disabled/>";
	echo "</div>";
	
	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Category</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$bkcateg\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Accession Number</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$accno\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Description</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$desk\" disabled/>";
	echo "</div>";
?>