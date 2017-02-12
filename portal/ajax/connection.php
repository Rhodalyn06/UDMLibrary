<?php
    error_reporting(E_ALL & ~E_NOTICE);
    date_default_timezone_set('Singapore');
    $servername = isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : "localhost";
    $username = isset($_ENV['DB_USER']) ? $_ENV['DB_USER'] : "udmlibra_udmad";
    $pass = isset($_ENV['DB_PASS']) ? $_ENV['DB_PASS'] : '%p6bIAgdd+u0';
    $dbname = isset($_ENV['DB_NAME']) ? $_ENV['DB_NAME'] : "udmlibra_udmdb";
    $conn = mysqli_connect($servername, $username, $pass, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
