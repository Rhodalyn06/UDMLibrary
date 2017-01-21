<!-- BOOKS TO BE BORROWED -->
<?php
  echo "<div class=\"row\">
  <div class=\"col-md-12\">
                      <div class=\"panel panel\">
                        <div class=\"panel-heading\" style=\"font-family:'MYRIAD PRO REGULAR';\">
                             Books to be returned
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
                                          Status
                                        </th>
                                        <th>
                                          Penalty
                                        </th>
                                
                                    </thead>
                                    <tbody>";
?>
<?php
	include_once('../connection.php');
	//$id = $_POST['type'];
	$sql = $conn->query("SELECT a.Title as Title, a.Barcode, b.ID AS sa, 
		c.ID as AccessionID, b.BarcodeID as Barcode, c.ID, 
		d.DateBorrowed as DateBorrowed, d.DateToReturn AS DateToReturn, b.Penalty AS Penalty, b.Status as Status
		FROM temp_return b INNER JOIN tb_acquisition a ON a.Barcode = b.BarcodeID
		INNER JOIN tb_book c ON a.AcquisitionId = c.AcquisitionId 
		and b.Accession = c.ID
		INNER JOIN tb_borrowandreturn d ON b.Accession=d.AccessionID WHERE d.ActualDateReturned='0000-00-00'");

	if (!$sql){
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	else{
		while(($row=$sql->fetch_assoc())==true){
		$bookTitle = $row['Title'];
		$BorrowerType = $row['Barcode'] . "-" . $row['AccessionID'];
		$status = $row['Status'];
		
		$penalty = $row['Penalty'];
		$x = "";
		
    $h = $row['sa'];
		echo "<tr onclick=\"del('$h')\">";
		echo "<td>$BorrowerType</td>";
		echo "<td>$bookTitle</td>";
		echo "<td>$status</td>";
		echo "<td>$penalty</td>";
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