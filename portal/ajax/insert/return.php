<?php
	include_once('../connection.php');

	$studid = $_POST['type1'];
	$id = $_POST['type'];
	$borrowandreturnid = $_POST['type2'];
	$barcode = substr($id, 0, 10);
  	$Accession = substr($id,11);
  	$bookStat = $_POST['type3'];
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
				//$bookonhand = $row['BookOnHand'];
				
					$sql = $conn->query("SELECT * FROM temp_return");
					if (!$sql){
						$penalty=getPenalty($Accession, $barcode, $studid, $bookStat);
						$sql = $conn->query("INSERT into temp_return (ID, BarcodeID, Accession, Penalty, Status) VALUES ('$borrowandreturnid', '$barcode', '$Accession', '$penalty', '$bookStat')");
						echo "noerror";
					}
					else{
						$sql = $conn->query("SELECT * FROM temp_return WHERE BarcodeID = '$barcode' AND Accession = '$Accession'");
							if (!$sql){
								echo "error6";
							}
							else{
								if (mysqli_num_rows($sql)==0){
									$sql=$conn->query("SELECT Status FROM tb_book where ID='$Accession'");
									$row=$sql->fetch_assoc();
									if ($row['Status']=="On Loan"){
										//for penalty
										$penalty=getPenalty($Accession, $barcode, $studid, $bookStat);

										$sql = $conn->query("INSERT into temp_return (ID, BarcodeID, Accession, Penalty, Status) VALUES ('$borrowandreturnid', '$barcode', '$Accession', '$penalty', '$bookStat')");
										echo "noerror";
									}
									else{
										echo "error8";
									}
								}
								else{
									echo "error6";
								}
							}
					}
				
			}
		}
	}

	function getPenalty($Accession, $barcode, $stud, $bookStat){
		include ('../connection.php');
		$penalty=0;
		$sql = $conn->query("SELECT c.DateBorrowed as DateBorrowed, d.BorrowerType as BorrowerType FROM tb_book a 
	    INNER JOIN tb_acquisition b ON a.AcquisitionId = b.AcquisitionId 
	    INNER JOIN tb_borrowandreturn c ON a.ID = c.AccessionID 
	    INNER JOIN tb_borrower d On d.BorrowerID = c.BorrowerID
	    WHERE a.ID='$Accession' and  b.Barcode='$barcode' AND a.Status='On Loan' AND d.UserID = '$stud' AND c.ActualDateReturned='0000-00-00'");
		$row = $sql->fetch_assoc();

		if ($row['BorrowerType'] == "FACULTY"){
			$penalty = 0;
		}
	    else{
	    	$DateBorrowed = $row['DateBorrowed'];
			$DateToReturn = date('Y-m-d');

			$date1 = date_create($DateBorrowed);
			$date2 = date_create($DateToReturn);

			$diff = date_diff($date1, $date2)->format("%a");

			if ($diff > 1){
				$sql = $conn->query("SELECT Distinct HolidayDate FROM tb_holidays WHERE HolidayDate BETWEEN '$DateBorrowed' and '$DateToReturn'");
				$diff -=1;	
				if ($sql){

					$diff -= mysqli_num_rows($sql);
					if ($diff < 0){
						$penalty = 0;
					}else{
						$sql1 = $conn->query("SELECT * FROM tb_price");
						$rows = $sql1->fetch_assoc();
						$penalty = $rows['Price'] * $diff;
					}
				}
			}
			else{
				$penalty=0;
			}
	    }

	    if ($bookStat != "Available"){
	    	$sql = $conn->query("SELECT Price FROM tb_acquisition WHERE Barcode='$barcode'");
	    	$row = $sql->fetch_assoc();

	    	$penalty += $row["Price"];
	    }

		return $penalty;
	}
?>