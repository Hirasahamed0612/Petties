<?php
session_start();

include 'db_connect.php';

if (isset($_POST['submit'])) {
    $admin_id = $_SESSION['admin_id']; 
    $old_pass = mysqli_real_escape_string($conn, $_POST['old_pass']);
    $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

    $query = "SELECT password FROM admin WHERE id = '$admin_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (password_verify($old_pass, $row['password'])) {
        if ($new_pass === $confirm_pass) {
            $new_pass_hashed = password_hash($new_pass, PASSWORD_BCRYPT);
            
            $update_query = "UPDATE admin SET password = '$new_pass_hashed' WHERE id = '$admin_id'";
            if (mysqli_query($conn, $update_query)) {
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Password updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to update password',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>";
            }
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'New passwords do not match',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Old password is incorrect',
                showConfirmButton: false,
                timer: 1500
            });
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <div class="content">
        <h1 class="title">Change Password</h1>
        <form action="" method="post">
            <input type="password" name="old_pass" placeholder="Enter your old password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="new_pass" placeholder="Enter your new password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="confirm_pass" placeholder="Confirm your new password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="submit" value="update now" name="submit" class="btn">
        </form>
    </div>
    <script src="js/admin_script.js"></script>
</body>
</html>
