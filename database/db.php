<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trike_talk";
$port ="3308";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname,$port);
    echo "succsess";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 