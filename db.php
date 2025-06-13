<?php
$host = "localhost";
$dbname = "dbybta1dmciwcj";
$username = "uxgukysg8xcbd";
$password = "6imcip8yfmic";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
