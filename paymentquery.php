<?php


$userid = $_POST["userid"];

$month = $_POST["monthSelected"];
$date = $_POST["date"];
$amount = $_POST["amount"];




if (empty($month) || empty($date) || empty($amount) ) {
    echo "Please fill in all required fields.";
    exit;
}



$sql = "INSERT INTO payments (month ,date,amount,userid) VALUES ( ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $month, $date, $amount, $userid);

if ($stmt->execute()) {
    echo "submittion succesfull.";
    header("Location: paymentform.php");
} else {
    echo $userid;
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();

?>
