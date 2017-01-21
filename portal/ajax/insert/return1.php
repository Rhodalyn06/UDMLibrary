<?php
	include_once("../connection.php");
	$borrower = $_POST['type'];

	$sql = $conn->query("SELECT * FROM temp_return");
	if (!$sql){
		echo "error7";
	}
	else{
		if(mysqli_num_rows($sql)==0){
			echo "error7";
		}
		else{
			$sql = $conn->query("SELECT BorrowerID FROM tb_borrower WHERE UserID='$borrower'");

			if (!$sql){
				echo "error1";
			}
			else{
				if (mysqli_num_rows($sql)==0){
					echo "error1";
				}
				else{
					$row=$sql->fetch_assoc();
					$borrowerid = $row['BorrowerID'];
					date_default_timezone_set('Singapore');
					$today = date("Y-m-d");
					$dateborrowed = $today;
				    //echo $today . "<br/>";
				    $today = date_create($today);

				    $today = date_add($today, date_interval_create_from_date_string("1 Day"));
				    $today = $today->format("Y-m-d");
				    $datetoreturn=$today;
				    //echo $today;
					$sql1 = $conn->query("SELECT * FROM temp_return");
					if (!$sql1){
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
						$sql = $conn->query("INSERT into transcation VALUES ('$transid', 'return')");

						if ($sql){
							while (($row=$sql1->fetch_assoc())==true){
								$accessionid = $row['Accession'];
								$penalty = $row['Penalty'];
								$gg = $row['ID'];
								$today = date("Y-m-d");	
								$stat = $row['Status'];
								$statB = 0;
								if ($stat != "Available"){
									$statB = 1;
								}
								$sql=$conn->query("UPDATE tb_borrowandreturn SET ActualDateReturned = '$today', Penalty='$penalty', transReturn='$transid', lostdamage='$statB' WHERE BorrowingReturningID = '$gg'");

								if ($sql){
									$sql2 = $conn->query("UPDATE tb_book SET Status='$stat' WHERE ID = '$accessionid'");
									if ($sql2){
										$sql3 = $conn->query("SELECT * FROM tb_borrower WHERE BorrowerID='$borrowerid'");
										if ($sql3){
											$row=$sql3->fetch_assoc();
											$bookonhand = $row['BookOnHand'] - 1;
											$sql3 = $conn->query("UPDATE tb_borrower SET BookOnHand = '$bookonhand' WHERE BorrowerID='$borrowerid'");
										}
									}
								}
								else{
									echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								}
							}
							echo $transid;
						}
						$sql = $conn->query("DELETE FROM temp_return");
						
					}
					
			
				}
			}
		}
	}
?>