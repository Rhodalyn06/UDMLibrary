<!DOCTYPE html>
<html>
<head>
	<title>Book Borrow Receipt</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../../img/udm.jpg">
	
</head>
<body>
<style>
	html {
  
  -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
}
body {
  margin: 0;
}
p {
	text-align: center;
}
div{
	width: 320px;
    padding: 10px;
    border: 5px solid green;
    margin-right: 20px;
    margin-left: 500px

}
</style>
<?php
	include_once("../connection.php");

	$trans = $_GET['trans'];

	$sql = $conn->query("SELECT c.FirstName as FirstName, 
		c.LastName as LastName, c.UserID as UserID, b.Title as Title, 
		a.DateToReturn as DueDate, b.Barcode, d.ID as ID  
		FROM tb_borrowandreturn a INNER join 
		tb_book d ON d.ID = a.AccessionID INNER JOIN
		tb_acquisition b ON d.AcquisitionID = b.AcquisitionID INNER JOIN 
		tb_borrower c ON a.BorrowerID = c.BorrowerID 
		WHERE trans = '$trans'");

?>

<div class = "row">
		
		
		<p style="text-align:center;">Universida de Manila Official Receipt </p>
	
	<p style="font-size:15px; font-family: Arial;">
		Manila, Philippines
	</p>
<p style="font-size:18px; font-family: Arial;">
<label>Date:</label>
	
		<?php echo date("M d, Y h:i:s a");?>
	
</p>
	<p style="font-size:16px; font-family: Arial;">
	<label>Name:</label>
		<?php
			$row=$sql->fetch_assoc();
			echo $row['FirstName'] . " " . $row['LastName'];
		?>
	
</p>
	<p style="font-size:16px; font-family: Arial;">
	<label>User ID:</label>
		<?php
			echo $row['UserID'];
		?>
	
</p>
	<p style="font-size:16px; font-family: Arial;">
		Transaction: Borrow
	
</p><br/>
<?php
	$sql = $conn->query("SELECT c.FirstName as FirstName, 
		c.LastName as LastName, c.UserID as UserID, b.Title as Title, 
		a.DateToReturn as DueDate, a.DateBorrowed as DateBorrowed, b.Barcode, d.ID as ID  
		FROM tb_borrowandreturn a INNER join 
		tb_book d ON d.ID = a.AccessionID INNER JOIN
		tb_acquisition b ON d.AcquisitionID = b.AcquisitionID INNER JOIN 
		tb_borrower c ON a.BorrowerID = c.BorrowerID 
		WHERE trans = '$trans'");
	while(($row = $sql->fetch_assoc()) == true){
		echo "<p style='font-size:16px; font-family: Arial;'>";
		echo "<b>Title:</b>" . " " . $row['Title'] . "<br/>";
		echo "<b>Barcode:</b>" . " " . $row['Barcode'] . "-" . $row['ID'] . "<br/>";
		echo "<b>Due Date:</b>" . " " .  $row['DueDate'] . "<br/>";
		$due = $row["DueDate"];
		$bor = $row["DateBorrowed"];
		$sql3 = $conn->query("SELECT * FROM tb_holidays Where HolidayDate='$due'");
		if (mysqli_num_rows($sql3)!=0){
			$date=date_create($due);
			$day = date_sub($due,date_interval_create_from_date_string("1 days"));
			echo "<b>Target Date to return (Holiday) :</b>" . " " .  $day . "<br/>";
		}
		echo "-------------------------";
	
	}
?>
<br/><br/>

	<p> Served By: Librarian </p>
	
</div>


</body>
</html>

