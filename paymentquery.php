<?php


$userid = $_POST["userid"];

$month = $_POST["monthSelected"];
$date = $_POST["date"];
$amount = $_POST["amount"];

$sql = "INSERT INTO payments (month ,date,amount,userid) VALUES ( ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $month, $date, $amount, $userid);

if ($stmt->execute()) {
    
    header("Location: paymentform.php");
} else {
    echo $userid;
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();

?>
