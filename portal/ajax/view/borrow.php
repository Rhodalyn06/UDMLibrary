<?php


	echo "<div class=\"row\">
  <div class=\"col-md-12\">
                      <div class=\"panel panel\">
                        <div class=\"panel-heading\"  style=\"font-family:'MYRIAD PRO REGULAR';\">
                              User Information
                        </div>
                        <div class=\"panel-body\">
                            <div class=\"table-responsive\">
                                <table class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">
                                    <thead>
                                      	<th>
                                          User ID
                                        </th>
                                        <th>
                                          Name
                                        </th>
                                        <th>
                                          Borrower Type
                                        </th>
                                        <th>
                                          Book On Hand
                                        </th>
                                    
                                    </thead>
                                    <tbody>";
?>
<?php
	include_once('../connection.php');
	$id = $_POST['type'];
	$sql = $conn->query("SELECT * FROM tb_borrower where UserID='$id'");

	while(($row=$sql->fetch_assoc())==true){
		$BorrowerType = $row['BorrowerType'];
		$name = $row['FirstName'] . " " . $row['LastName'];
		$book = $row['BookOnHand'];

		
		$x = "";
		

		echo "<tr>";
		echo "<td style='font-size:25px;'>$id</td>";
		echo "<td style='font-size:25px;'>$name</td>";
		echo "<td style='font-size:25px;'>$BorrowerType</td>";
		echo "<td style='font-size:25px;'>$book</td>";
		echo "</tr>";

	}
?>
<?php
	echo "</tbody>
                                </table>
                            </div>
                        </div>
                    </div>";
?>




<!-- BOOKS TO BE BORROWED -->
<?php
echo "<div class=\"row\">
  <div class=\"col-md-12\">
                      <div class=\"panel panel\">
                        <div class=\"panel-heading\" style=\"font-family:'MYRIAD PRO REGULAR';\">
                             Books to be borrowed
                        </div>
                        <div class=\"panel-body\">
                            <div class=\"table-responsive\">
                                <table class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">
                                    <thead>
                            
                                        <th>
                                          Barcode
                                        </td>
                                        <th>
                                          Title
                                        </th>
                              
                                    </thead>
                                    <tbody>";
?>
<?php
  include_once('../connection.php');
  //$id = $_POST['type'];
  $sql = $conn->query("SELECT a.Title as Title, a.Barcode, b.ID AS sa, c.ID as AccessionID, b.BarcodeID as Barcode, c.ID
    FROM temp_borrow b INNER JOIN tb_acquisition a ON a.Barcode = b.BarcodeID
    INNER JOIN tb_book c ON a.AcquisitionId = c.AcquisitionId and b.Accession = c.ID");

  if (!$sql){
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  else{
    while(($row=$sql->fetch_assoc())==true){
    $bookTitle = $row['Title'];
    $BorrowerType = $row['Barcode'] . "-" . $row['AccessionID'];
    

    
    $x = "";
    
    $h = $row['sa'];
    echo "<tr onclick=\"del('$h')\">";
    echo "<td style='font-size:25px;'>$BorrowerType</td>";
    echo "<td style='font-size:25px;'>$bookTitle</td>";
    
    echo "</tr>";

  }
  }
?>
<?php
  echo "</tbody>
                                </table>
                            </div>
                        </div>
                    </div>";
?>






<?php
	echo "<div class=\"row\">
  <div class=\"col-md-12\">
                      <div class=\"panel panel\">
                        <div class=\"panel-heading\" style=\"font-family:'MYRIAD PRO REGULAR';\">
                              Unreturned Books
                        </div>
                        <div class=\"panel-body\">
                            <div class=\"table-responsive\">
                                <table class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">
                                    <thead>
                                   
                                      	<th>
                                          Barcode
                                        </th>
                                        <th>
                                          Title
                                        </th>
                                        <th>
                                          Date Loan
                                        </th>
                                        <th>
                                          Valid Until
                                        </th>
                                 
                                    </thead>
                                    <tbody>";
?>
<?php
	include_once('../connection.php');
	$id = $_POST['type'];
	$sql = $conn->query("SELECT a.Title as Title, a.Barcode as Barcode, b.AccessionID as AccessionID, 
		b.DateBorrowed as DateLoan, b.DateToReturn as ValidUntil
		FROM tb_borrowandreturn b INNER JOIN tb_book d ON d.ID = b.AccessionID 
    INNER JOIN tb_acquisition a ON d.AcquisitionId = a.AcquisitionId
		INNER JOIN tb_borrower c ON c.BorrowerID=b.BorrowerID 
		where c.UserID='$id' and b.ActualDateReturned='00-00-0000'");

	if (!$sql){
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	else{
		while(($row=$sql->fetch_assoc())==true){
		$bookTitle = $row['Title'];
		$BorrowerType = $row['Barcode'] . "-" . $row['AccessionID'];
		$dateLoan = $row['DateLoan'];
		$validUntil = $row['ValidUntil'];

		
		$x = "";
		

		echo "<tr>";
		echo "<td style='font-size:25px;'>$BorrowerType</td>";
		echo "<td style='font-size:25px;'>$bookTitle</td>";
		echo "<td style='font-size:25px;'>$dateLoan</td>";
		echo "<td style='font-size:25px;'>$validUntil</td>";
		
		echo "</tr>";

	}
	}
?>
<?php
	echo "</tbody>
                                </table>
                            </div>
                        </div>
                    </div>";
?>

