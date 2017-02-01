<?php
    date_default_timezone_set('Asia/Manila');
    $servername = $_ENV['DB_HOST'] ?: "localhost";
    $username = $_ENV['DB_USER'] ?: "root";
    $pass = $_ENV['DB_PASS'] ?: null;
    $dbname = $_ENV['DB_NAME'] ?: "dblibsys";
    $conn = mysqli_connect($servername, $username, $pass, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
