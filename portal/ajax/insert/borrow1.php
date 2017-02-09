<?php
	include_once("../connection.php");
	$borrower = $_REQUEST['type'];
	$sql = $conn->query("SELECT * FROM temp_borrow");
	if (!$sql){
		echo "error4";
	}
	else{
		if(mysqli_num_rows($sql)==0){
			echo "error4";
		}
		else{
			$sql = $conn->query("SELECT BorrowerID AS BorrowerID, BorrowerType as BorrowerType FROM tb_borrower WHERE UserID='$borrower'");

			if (!$sql) {
				echo "error1";
			} else {
				if (mysqli_num_rows($sql)==0){
					echo "error1";
				} else {
					$row = $sql->fetch_assoc();
					$borrowerid = $row['BorrowerID'];
					date_default_timezone_set('Singapore');
					$today = date("Y-m-d");
					$dateborrowed = $today;
				    //echo $today . "<br/>";
				    $today = date_create($today);
				    $g = 5;
				    if ($row['BorrowerType']=="STUDENT"){
				    	$g = 3;
				    }
				    $today = date_add($today, date_interval_create_from_date_string("1 Day"));
				    $today = $today->format("Y-m-d");
				    $datetoreturn=$today;
				    //echo $today;
					$sql1 = $conn->query("SELECT * FROM temp_borrow");
					if (!$sql1) {
						echo "XD";
					}
					else{
						$sql = $conn->query("SELECT id from transcation ORDER BY id DESC");
						if ($sql){
							$row1 = $sql->fetch_assoc();
							$transid = $row1["id"];
						}
						else{
							$transid = 0;
						}
						$transid +=1;
						$sql = $conn->query("INSERT into transcation VALUES ('$transid', 'borrow')");
						while (($row=$sql1->fetch_assoc())==true){
							$accessionid = $row['Accession'];


							if ($sql) {
								$sql=$conn->query("
									INSERT into tb_borrowandreturn (
										BorrowerID,
										AccessionID,
										DateBorrowed,
										DateToReturn,
										trans,
										ActualDateReturned,
										Penalty,
										transReturn,
										lostdamage
									) VALUES (
										'$borrowerid',
										'$accessionid',
										'$dateborrowed',
										'$datetoreturn',
										'$transid',
										'0000-00-00',
										0,
										0,
										0
									)");

								if ($sql){
									$sql2 = $conn->query("UPDATE tb_book SET Status='On Loan' WHERE ID = '$accessionid'");
									if ($sql2){
										$sql3 = $conn->query("SELECT * FROM tb_borrower WHERE BorrowerID='$borrowerid'");
										if ($sql3){
											$row=$sql3->fetch_assoc();
											$bookonhand = $row['BookOnHand'] + 1;
											$sql3 = $conn->query("UPDATE tb_borrower SET BookOnHand = BookOnHand + 1 WHERE BorrowerID='$borrowerid'");

										}
									}
								} else {
									echo mysqli_error($conn);
									exit;
								}
							}


						}
						echo $transid;
					}

					//echo "<script>window.open('reports/index.php');</script>";

					$sql = $conn->query("DELETE FROM temp_borrow");
				}
			}
		}
	}
?>
