<?php


require_once 'connection.php';


$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);




$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    
    $user = $result->fetch_assoc();

    
    if (password_verify($password, $user["password"])) {
       
        session_start();
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["email"];
        $_SESSION["first_name"] = $user["first_name"];
        $_SESSION["last_name"] = $user["last_name"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["phone_number"] = $user["phone_number"];
        header("Location: home.php");
        exit;
    } else {
        header("Location: login.html?error=Invalid%20username%20or%20password.");
    }
} else {
    header("Location: login.html?error=Invalid%20username%20or%20password.");
}

$stmt->close();
$conn->close();

?>
