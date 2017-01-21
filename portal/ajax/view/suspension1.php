<?php
	include_once("../connection.php");
	$id = $_POST['type'];
	$sql = $conn->query("Select * FROM tb_holidays WHERE id='$id'");

	$row=$sql->fetch_assoc();
	$holidayName = $row['HolidayName'];
	$holidayId = $row['id'];
	$holidayDate = $row['HolidayDate'];
	
?>
<?php
echo "<div class=\"form-group\">";
	echo "<label>Suspension Name</label>";
	echo "<input class=\"form-control\" value=\"$holidayName\" id=\"sName\"/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label>Suspension Date</label>";
	echo "<input class=\"form-control\" value=\"$holidayDate\" id=\"sDate\" type='date'/>";
	echo "</div>";

?>