<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password_raw = $_POST["password"];
    $password_hashed = password_hash($password_raw, PASSWORD_BCRYPT);

    // Check if username already exists
    $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
    if (!$check) {
        die("Prepare failed: " . $conn->error);
    }
    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error = "Username already taken. Try another.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        if (!$stmt) {
            die("Insert prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ss", $username, $password_hashed);
        if ($stmt->execute()) {
            $_SESSION['user_id'] = $stmt->insert_id;
            $_SESSION['username'] = $username;
            echo "<script>window.location.href='home.php';</script>";
            exit;
        } else {
            $error = "Error inserting user: " . $stmt->error;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body { font-family: Arial; background: #e9edef; display: flex; justify-content: center; align-items: center; height: 100vh; }
        form { background: white; padding: 30px; border-radius: 10px; width: 320px; box-shadow: 0 0 10px rgba(0,0,0,0.2); }
        input { margin: 10px 0; padding: 12px; width: 100%; border-radius: 6px; border: 1px solid #ccc; }
        button { padding: 12px; background: #25d366; border: none; color: white; font-weight: bold; width: 100%; border-radius: 6px; cursor: pointer; }
        .link { text-align: center; margin-top: 12px; }
        .error { color: red; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <form method="post">
        <h2 style="text-align:center;">Create Account</h2>
        <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Sign Up</button>
        <div class="link"><a href="login.php">Already have an account?</a></div>
    </form>
</body>
</html>
