<?php

include 'db_connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Basic input validation
    if (empty($email) || empty($password)) {
        echo "<script>
                Toastify({
                    text: 'Please fill in all fields.',
                    duration: 3000,
                    close: true,
                    gravity: 'top',
                    position: 'center',
                    backgroundColor: 'linear-gradient(to right, #ff5f6d, #ffc371)',
                }).showToast();
              </script>";
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verify password (for plain text, simply compare strings)
            if ($password == $row['password']) {
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['user_email'] = $row['email'];
                echo "<script>
                        Toastify({
                            text: 'Login successful!',
                            duration: 3000,
                            close: true,
                            gravity: 'top',
                            position: 'center',
                            backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)',
                        }).showToast();
                      </script>";
                // Redirect to a protected page
                header("Location: admin_page.php");
                exit();
            } else {
                echo "<script>
                        Toastify({
                            text: 'Invalid password.',
                            duration: 3000,
                            close: true,
                            gravity: 'top',
                            position: 'center',
                            backgroundColor: 'linear-gradient(to right, #ff5f6d, #ffc371)',
                        }).showToast();
                      </script>";
            }
        } else {
            echo "<script>
                    Toastify({
                        text: 'No user found with this email.',
                        duration: 3000,
                        close: true,
                        gravity: 'top',
                        position: 'center',
                        backgroundColor: 'linear-gradient(to right, #ff5f6d, #ffc371)',
                    }).showToast();
                  </script>";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
<div class="form-container">
    <form action="" method="post">
        <h1>Welcome to Petties <br> Admin Login</h1>
        <input type="email" name="email" placeholder="Enter your email" required class="box">
        <input type="password" name="password" placeholder="Enter your password" required class="box">
        <input type="submit" name="submit" value="Login" class="btn">
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>
</html>
