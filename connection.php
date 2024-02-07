<?php
$servername = "localhost";
$username = "root";
$password = "1314";
$database = "famfin";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>