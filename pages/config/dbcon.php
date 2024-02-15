<?php
session_start();
ob_start();
$servername = "localhost";
$username = "id21878738_admin_alyxsis";
$password = "Tropang_08";
$dbname = "id21878738_db_esystemcha";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>