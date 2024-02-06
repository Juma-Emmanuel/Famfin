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

// Prepare and sanitize user input
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

// Validate empty fields
if (empty($email) || empty($password)) {
    echo "Please fill in all required fields.";
    exit;
}

// Select user data with prepared statement (secure against SQL injection)
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
        echo "Invalid username or password.";
    }
} else {
    echo "Invalid username or password.";
}

$stmt->close();
$conn->close();

?>
