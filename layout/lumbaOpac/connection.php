<?php
    date_default_timezone_set('Singapore');
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "opac_revision5";
    $conn = mysqli_connect($servername, $username, $pass, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>