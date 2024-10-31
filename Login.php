<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/sign.css">
</head>
<body>
    <div class="login-container">
        <div class="text-container">
            <div class="title-container">
                <h2>Login</h2>
                <p>Welcome back! Please log in to access your account.</p>
            </div>

            <div class="login-box">
                <form>
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Enter your Email" required>
            
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Enter your Password" required>               
                    
                    <a href="#" class="forgot-password">Forgot Password?</a>
                    
                    <button type="submit" class="login-button">Login</button>
                </form>
                <span class="signup-link">Don't have an account? <a href="#" class="signup-button">Sign Up</a></span>
            </div>
        </div>
        <div class="illustration">
            <img src="images/Dog poop-cuate 1.png" alt="Illustration">
        </div>
    </div>
</body>
</html>