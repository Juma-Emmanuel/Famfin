<?php

$servername = "localhost";
$username = "root";
$password = "password";
$database = "fss";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user data from form
$userid = $_POST["userid"];

$month = $_POST["monthSelected"];
$date = $_POST["date"];
$amount = $_POST["amount"];



// Validate data
if (empty($month) || empty($date) || empty($amount) ) {
    echo "Please fill in all required fields.";
    exit;
}



$sql = "INSERT INTO payments (month ,date,amount,userid) VALUES ( ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $month, $date, $amount, $userid);

if ($stmt->execute()) {
    echo "submittion succesfull.";
} else {
    echo $userid;
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();

?>
