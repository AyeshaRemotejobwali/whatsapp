<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login - WhatsApp Clone</title>
</head>
<body>
    <h2>Login</h2>

    <form action="login_process.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
