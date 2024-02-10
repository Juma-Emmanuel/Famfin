<?php
require_once 'connection.php';

$id = $_POST["id"];
echo $id;
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$phone_number =$_POST["phone_number"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];





$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO admin (id,first_name ,last_name, email,phone_number,password) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssss", $id, $first_name, $last_name, $email, $phone_number, $hashed_password);

if ($stmt->execute()) {
    header("Location: adminlogin.html?success=Registration%20successful!%20Please%20login%20to%20continue.");

} else {
    
    header("Location: adminregister.html?error=error".$conn->error);
}

$stmt->close();
$conn->close();

?>
