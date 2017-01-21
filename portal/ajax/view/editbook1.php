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

	$sql = $conn->query("SELECT * FROM tb_book WHERE AcquisitionId='$id'");

	$row = $sql->fetch_assoc();

	$isbn = $row['ISBN'];
	$sub = $row['SubAuthors'];
	echo "<div class=\"form-group\">";
	echo "<label>Barcode</label>";
	echo "<input class=\"form-control\" value=\"$barcode\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>Acquisition ID</label>";
	echo "<input class=\"form-control\" value=\"$id\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>Call Number</label>";
	echo "<input class=\"form-control\" value=\"$callno\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>Title</label>";
	echo "<input class=\"form-control\" value=\"$title\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>Author's Last name</label>";
	echo "<input class=\"form-control\" value=\"$lname\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>Author's First Name</label>";
	echo "<input class=\"form-control\" value=\"$fname\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>Sub Authors</label>";
	echo "<input class=\"form-control\" value=\"$sub\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>Edition</label>";
	echo "<input class=\"form-control\" value=\"$edition\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>Copyright</label>";
	echo "<input class=\"form-control\" value=\"$copyright\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>Number of Copies</label>";
	echo "<input class=\"form-control\" value=\"$copy\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>ISBN</label>";
	echo "<input class=\"form-control\" value=\"$isbn\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>Acquisition Method</label>";
	echo "<input class=\"form-control\" value=\"$method\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>Price</label>";
	echo "<input class=\"form-control\" value=\"$price\" disabled/>";
	echo "</div>";
	
	echo "<div class=\"form-group\">";
	echo "<label>Category</label>";
	echo "<input class=\"form-control\" value=\"$bkcateg\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>Accession Number</label>";
	echo "<input class=\"form-control\" value=\"$accno\" disabled/>";
	echo "</div>";
?>