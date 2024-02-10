<?php
require_once 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['recipient'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $email = $_POST['email'];

    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    $mail_sent = mail($to, $subject, $message, $headers);
    
    $response = array();
    if ($mail_sent) {
        $response['success'] = true;
        $response['message'] = "Email sent successfully!";
    } else {
        
        $response['success'] = false;
        $response['message'] = "Failed to send email.";
    }

$conn->close();
echo json_encode($response);
}
?>
