<?php
session_start();
include "config.php";
$me = $_SESSION['user_id'];
$contact = intval($_GET['contact_id']);
$stmt = $conn->prepare("SELECT * FROM messages WHERE (sender_id=? AND receiver_id=?) OR (sender_id=? AND receiver_id=?) ORDER BY timestamp ASC");
$stmt->bind_param("iiii", $me, $contact, $contact, $me);
$stmt->execute();
$result = $stmt->get_result();
$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}
header("Content-Type: application/json");
echo json_encode($messages);
?>
