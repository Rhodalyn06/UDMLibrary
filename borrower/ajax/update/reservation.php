<?php
	include_once("../connection.php");

	$id = $_POST['type'];


	$sql = $conn->query("UPDATE tb_reservation SET Status='Borrowed' WHERE ReservationID='$id'");

	if ($sql){
		$sql = $conn->query("SELECT * FROM tb_reservation WHERE ReservationID = '$id'");
		$row=$sql->fetch_assoc();

		$borrower = $row["BorrowerID"];
		$accession = $row["BookID"];

		$sql = $conn->query("UPDATE tb_book SET Status='On Loan' WHERE ID='$accession'");
		if ($sql){
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

						if ($sql){
							date_default_timezone_set('Singapore');
					$today = date("Y-m-d");
					$dateborrowed = $today;
				    //echo $today . "<br/>";
				    $today = date_create($today);
				    
				    $today = date_add($today, date_interval_create_from_date_string("1 Day"));
				    $today = $today->format("Y-m-d");
				    $datetoreturn=$today;
					$sql=$conn->query("INSERT into tb_borrowandreturn (BorrowerID, AccessionID, DateBorrowed, DateToReturn, trans) VALUES 
								('$borrower', '$accession', '$dateborrowed', '$datetoreturn', '$transid')");
						}

		}
	}
?>