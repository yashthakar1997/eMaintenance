<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emaintenance";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";
echo "<script>console.log('Db Connected sucessfully')</script>"
?>