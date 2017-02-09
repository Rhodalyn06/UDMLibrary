<?php
	include_once('../connection.php');

	$fname=$_POST['type'];
	$lname=$_POST['type1'];

	$sql=$conn->query("INSERT into haha (fname, lname) VALUES ('$fname', '$lname')")
?>