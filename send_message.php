<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sender = $_SESSION['user_id'];
    $receiver = intval($_POST['receiver_id']);
    $msg = trim($_POST['message']);
    if ($msg != "") {
        $stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $sender, $receiver, $msg);
        $stmt->execute();
    }
}
?>
