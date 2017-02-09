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
	$id = $_REQUEST['type'];
  $barcode = substr($id, 0, 10);
  $Accession = substr($id,11);
	$sql = $conn->query("SELECT b.Title as Title, b.Author as Author, b.Lastname as Lastname FROM tb_book a
    INNER JOIN tb_acquisition b ON a.AcquisitionId = b.AcquisitionId WHERE a.ID='$Accession' and b.Barcode='$barcode'");
if (!$sql){
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  else{
	while(($row=$sql->fetch_assoc())==true){
		$name = $row['Author'] . " " . $row['Lastname'];
		$book = $row['Title'];

		$x = "";

		echo "<tr onclick=\"save('$id')\">";
		echo "<td style='font-size:25px;'>$id</td>";
		echo "<td style='font-size:25px;'>$book</td>";
		echo "<td style='font-size:25px;'>$name</td>";
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
