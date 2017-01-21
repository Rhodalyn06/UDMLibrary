<?php
	  echo "<div class=\"row\">
  <div class=\"col-md-12\">
                      <div class=\"panel panel\">
                        <div class=\"panel-heading\" style=\"font-family:'MYRIAD PRO REGULAR';\">
                              Book Information
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
                                          Main Author
                                      </th>
                                    </thead>
                                    <tbody>";
?>
<?php
	include_once('../connection.php');
	$id = $_POST['type'];
  $stud = $_POST['type1'];
  $barcode = substr($id, 0, 10);
  $Accession = substr($id,11);
	$sql = $conn->query("SELECT c.BorrowingReturningID AS borrowandreturnid, b.Title as Title, b.Author as Author, b.Lastname as Lastname FROM tb_book a 
    INNER JOIN tb_acquisition b ON a.AcquisitionId = b.AcquisitionId 
    INNER JOIN tb_borrowandreturn c ON a.ID = c.AccessionID 
    INNER JOIN tb_borrower d On d.BorrowerID = c.BorrowerID
    WHERE a.ID='$Accession' and  b.Barcode='$barcode' AND a.Status='On Loan' AND d.UserID = '$stud' AND c.ActualDateReturned='0000-00-00'");
if (!$sql){
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  else{
	while(($row=$sql->fetch_assoc())==true){
		$name = $row['Author'] . " " . $row['Lastname'];
		$book = $row['Title'];
    $borrowandreturnid = $row['borrowandreturnid'];
		
		$x = "";
		

		echo "<tr onclick=\"save('$id', '$borrowandreturnid')\">";
		echo "<td>$id</td>";
		echo "<td>$book</td>";
		echo "<td>$name</td>";
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