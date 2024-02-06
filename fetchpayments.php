<?php
require_once 'connection.php';

$sql = "SELECT * FROM payments WHERE id = $id";
$result = $conn->query($sql);

?>