<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Amit@4084"; // MySQL root password
$dbname = "login_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Connected to MySQL Workbench!";
}
?>
