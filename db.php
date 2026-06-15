<?php
$conn = new mysqli("127.0.0.1", "root", "Imnot@17", "hostel_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

