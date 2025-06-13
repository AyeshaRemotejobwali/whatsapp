<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                header("Location: home.php");
                exit;
            } else {
                echo "❌ Incorrect password.";
            }
        } else {
            echo "❌ User not found.";
        }
        $stmt->close();
    } else {
        echo "❌ Both fields are required.";
    }
    $conn->close();
} else {
    echo "❌ Invalid request.";
}
?>
