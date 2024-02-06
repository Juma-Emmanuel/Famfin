<?php
require_once 'connection.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>