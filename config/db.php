<?php
$host = "localhost";   // usually localhost
$user = "root";        // default user ng XAMPP/MAMP
$pass = "";            // default password (blank sa XAMPP)
$db   = "personaldatasheet";   // pangalan ng database mo

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
