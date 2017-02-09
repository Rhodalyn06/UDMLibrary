<?php
	include_once('../connection.php');

	$studid = $_POST['type1'];
	$id = $_POST['type'];

	$barcode = substr($id, 0, 10);
  	$Accession = substr($id,11);

	if ($studid==""){
		echo "error1";
	}
	else{
		$sql = $conn->query("SELECT * FROM tb_borrower WHERE UserID = '$studid'");
		if (!$sql){
			echo "error1";
		}
		else{
			if (mysqli_num_rows($sql)==0){
				echo "error1";
			}
			else{
				$row = $sql->fetch_assoc();
				$bookonhand = $row['BookOnHand'];
				$bookLimit=0;
				if ($row['BorrowerType']=="STUDENT"){
					$bookLimit = 2;	
				}
				else{
					$bookLimit = 2;
				}
				if ($bookonhand == $bookLimit){
					echo "error2";
				}
				else{
					$sql = $conn->query("Select * FROM tb_borrowandreturn a INNER JOIN tb_book b 
					ON a.AccessionID = b.ID INNER JOIN tb_acquisition c ON 
					b.AcquisitionId = c.AcquisitionId INNER JOIN tb_borrower d ON a.BorrowerID = d.BorrowerID 
					WHERE c.Barcode='$barcode' and d.UserID='$studid' and 
					a.ActualDateReturned='0000-00-00'");
					if (!$sql){
						
						$sql = $conn->query("SELECT * FROM temp_borrow");
						if (!$sql){

							$sql = $conn->query("INSERT into temp_borrow (BarcodeID, Accession) VALUES ('$barcode', '$Accession')");
							echo "noerror";
						}
						else{
							if ((mysqli_num_rows($sql)+$bookonhand)==$bookLimit){
								echo "error2";
							}
							else{
								$sql = $conn->query("SELECT * FROM temp_borrow WHERE BarcodeID = '$barcode' AND Accession = '$Accession'");
								if (!$sql){
									echo "error3";
								}
								else{
									if (mysqli_num_rows($sql)==0){
										$sql=$conn->query("SELECT Status FROM tb_book where ID='$Accession'");
										$row=$sql->fetch_assoc();
										if ($row['Status']=="Available"){
											$sql = $conn->query("INSERT into temp_borrow (BarcodeID, Accession) VALUES ('$barcode', '$Accession')");
											echo "noerror";
										}
										else{
											echo "error5";
										}
									}
									else{
										echo "error3";
									}
								}
							}
						}
					}
					else{
						if (mysqli_num_rows($sql)==0){
							$sql = $conn->query("SELECT * FROM temp_borrow");
							if (!$sql){

								$sql = $conn->query("INSERT into temp_borrow (BarcodeID, Accession) VALUES ('$barcode', '$Accession')");
								echo "noerror";
							}
							else{
								if ((mysqli_num_rows($sql)+$bookonhand)==$bookLimit){
									echo "error2";
								}
								else{
									$sql = $conn->query("SELECT * FROM temp_borrow WHERE BarcodeID = '$barcode' AND Accession = '$Accession'");
									if (!$sql){
										echo "error3";
									}
									else{
										if (mysqli_num_rows($sql)==0){
											$sql=$conn->query("SELECT Status FROM tb_book where ID='$Accession'");
											$row=$sql->fetch_assoc();
											if ($row['Status']=="Available"){
												$sql = $conn->query("INSERT into temp_borrow (BarcodeID, Accession) VALUES ('$barcode', '$Accession')");
												echo "noerror";
												//echo $studid;
											}
											else{
												echo "error5";
											}
										}
										else{
											echo "error3";
										}
									}
								}
							}
						}
						else{
							echo "error3";
						}
					}
				}
			}
		}
	}

	
?>