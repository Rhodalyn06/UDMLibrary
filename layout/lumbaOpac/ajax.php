<?php
	$txt1 = $_GET['f'];
	$txt2 = $_GET['g'];
	$txt3 = $_GET['h'];
	$type1 = $_GET['i'];
	$type2 = $_GET['j'];
	$type3 = $_GET['k'];
	$opt1 = $_GET['l'];
	$opt2 = $_GET['m'];
	$q1 = $q2 = $q3 = "";
	if ($type1 == "accessionNumber" or $type1 == "possession"){
		$type1 = "books_table." . $type1;
	}
	else if ($type1 == "aname"){
		$type1 = "authors_name.name";
	}
	else if ($type1 == "publisherName"){
		$type1 = "publisher_information." . $type1;
	}
	else if ($type1 == "classification"){
		$type1 = "book_classification." . $type1;
	}
	else{
		$type1 = "book_table." . $type1;
	}

	if ($type2 == "accessionNumber" or $type2 == "possession"){
		$type2 = "books_table." . $type2;
	}
	else if ($type2 == "aname"){
		$type2 = "authors_name.name";
	}
	else if ($type2 == "publisherName"){
		$type2 = "publisher_information." . $type2;
	}
	else if ($type2 == "classification"){
		$type2 = "book_classification." . $type2;
	}
	else{
		$type2 = "book_table." . $type2;
	}

	if ($type3 == "accessionNumber" or $type3 == "possession"){
		$type3 = "books_table." . $type3;
	}
	else if ($type3 == "aname"){
		$type3 = "authors_name.name";
	}
	else if ($type3 == "publisherName"){
		$type3 = "publisher_information." . $type3;
	}
	else if ($type3 == "classification"){
		$type3 = "book_classification." . $type3;
	}
	else{
		$type3 = "book_table." . $type3;
	}

	if ($txt1 == ""){
		$q1 = "";
	}
	else
	{
		$q1 = $type1 . " like '%" . $txt1 . "%'";
		if ($txt2 == ""){

		}
		else
		{
			$q1 = $q1 . " " . $opt1 . " ";
		}
	}
	if ($txt2 == ""){
		$q2 = "";
	}
	else{
		$q2 = $type2 . " like '%" . $txt2 . "%'";
		if ($txt3 == ""){

		}
		else{
			$q2 = $q2 . " " . $opt2 . " ";
		}
	}

	if ($txt3 == ""){
		$q3 = "";
	}
	else{
		$q3 = $type3 . " like '%" . $txt3 . "%'";
		
	}
	$conj="";
	if ($txt1 == "" and $txt2 == "" and $txt3 == "")
	{
		$conj = "";
	}else{
		$conj = " where ";
	}

	include 'connection.php';

	$sql = "SELECT
	book_table.callNumber as b, book_table.name AS c,
	authors_name.name as d,  publisher_information.publisherName as e, book_table.yearPublished as f,
	books_table.possession as h
	FROM book_table JOIN books_table ON book_table.callNumber = books_table.callNumber 
	JOIN author_info ON book_table.callNumber = author_info.callNumber JOIN authors_name ON author_info.author_id = authors_name.authorId
	 JOIN publisher_information ON publisher_information.publisherId = book_table.publisherId 
	JOIN book_classification ON book_classification.classification_id = book_table.classification_id " . $conj . $q1 . $q2 . $q3 . " ORDER BY accessionNumber"; 
	$res = $conn->query($sql);
	if (!$res){
		echo "<script> alert('wrong input'); </script>";
	}
	else{
		while (($row=$res->fetch_assoc())==true){
			echo "<tr>";
			echo "<td>" . $row['a'] . "</td>";
			echo "<td>" . $row['b'] . "</td>";
			echo "<td>" . $row['c'] . "</td>";
			echo "<td>" . $row['d'] . "</td>";
			echo "<td>" . $row['e'] . "</td>";
			echo "<td>" . $row['f'] . "</td>";
			echo "<td>" . $row['g'] . "</td>";
			echo "<td>" . $row['h'] . "</td>";
			echo "</tr>";
		}
	}
?>