<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #25D366, #128C7E);
        }

        .logo {
            width: 80px;
            height: 80px;
            background: #25D366;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
            font-weight: bold;
            box-shadow: 0 8px 16px rgba(37, 211, 102, 0.3);
        }

        .welcome-text {
            color: #333;
            margin-bottom: 30px;
        }

        .welcome-text h1 {
            font-size: 28px;
            margin-bottom: 8px;
            color: #1f2937;
        }

        .welcome-text p {
            color: #6b7280;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-weight: 500;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #25D366;
            background: white;
            box-shadow: 0 0 0 3px rgba(37, 211, 102, 0.1);
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .divider {
            margin: 30px 0;
            position: relative;
            text-align: center;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e5e7eb;
        }

        .divider span {
            background: white;
            padding: 0 20px;
            color: #6b7280;
            font-size: 14px;
        }

        .register-link {
            color: #25D366;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .register-link:hover {
            color: #128C7E;
            text-decoration: underline;
        }

        .footer-text {
            margin-top: 30px;
            color: #9ca3af;
            font-size: 12px;
            line-height: 1.5;
        }

        .error-message {
            background: #fee2e2;
            color: #dc2626;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: none;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
                margin: 10px;
            }
            
            .logo {
                width: 60px;
                height: 60px;
                font-size: 24px;
            }
            
            .welcome-text h1 {
                font-size: 24px;
            }
        }

        /* Loading animation */
        .loading {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-right: 10px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .btn-text {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            WA
        </div>
        
        <div class="welcome-text">
            <h1>Welcome Back!</h1>
            <p>Sign in to continue chatting</p>
        </div>

        <div class="error-message" id="errorMessage">
            Invalid email or password. Please try again.
        </div>

        <form id="loginForm" method="POST" action="login_process.php">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>

            <button type="submit" class="login-btn" id="loginButton">
                <span class="btn-text">
                    <div class="loading" id="loadingSpinner"></div>
                    <span id="buttonText">Sign In</span>
                </span>
            </button>
        </form>

        <div class="divider">
            <span>Don't have an account?</span>
        </div>

        <a href="register.php" class="register-link">Create New Account</a>

        <div class="footer-text">
            By signing in, you agree to our Terms of Service and Privacy Policy.
        </div>
    </div>

    <script>
        // Form submission with loading animation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const button = document.getElementById('loginButton');
            const buttonText = document.getElementById('buttonText');
            const loading = document.getElementById('loadingSpinner');
            
            button.disabled = true;
            loading.style.display = 'block';
            buttonText.textContent = 'Signing In...';
        });

        // Hide error message when user starts typing
        document.getElementById('email').addEventListener('input', hideError);
        document.getElementById('password').addEventListener('input', hideError);

        function hideError() {
            document.getElementById('errorMessage').style.display = 'none';
        }

        // Show error message (this would typically be controlled by PHP)
        function showError(message) {
            const errorDiv = document.getElementById('errorMessage');
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
        }

        // Example: Show error if there's an error parameter in URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('error')) {
            showError('Invalid email or password. Please try again.');
        }
    </script>
</body>
</html>
