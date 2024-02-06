<?php

// Database connection details
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
$id = $_POST["id"];
echo $id;
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$phone_number =$_POST["phone_number"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];


// Validate data
if (empty($first_name) || empty($last_name) || empty($email) || empty($phone_number) || empty($password) || empty($confirm_password)) {
    echo "Please fill in all required fields.";
    exit;
}

// Check password confirmation
if ($password !== $confirm_password) {
    echo "Passwords do not match.";
    exit;
}

// Hash password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute SQL statement
$sql = "INSERT INTO users (id,first_name ,last_name, email,phone_number,password) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssss", $id, $first_name, $last_name, $email, $phone_number, $hashed_password);

if ($stmt->execute()) {
    echo "Registration successful! Please login to continue.";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();

?>
