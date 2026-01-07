<?php
$host = 'localhost';
$user = 'np03cs4a240109';
$pass = 'F6uxO6GbdI';
$dbname = 'np03cs4a240109';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
