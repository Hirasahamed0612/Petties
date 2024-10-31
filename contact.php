<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $details = $_POST["details"];

    $sql = "INSERT INTO contact (name, email, phone, details) VALUES ('$name', '$email', '$phone', '$details')";
    if ($conn->query($sql) === TRUE) {  
        echo "<script>
        window.location.href = 'pet-care.php';
        alert('Your Information Successfully Added!');
        </script>";
    } else {
        echo "<script>
        window.location.href = 'pet-care.php';
        alert('Please try again later!');
        </script>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <h1>Contact <span>Us</span></h1>
    <section class="contact-section">
        <div class="contact-container">
            <div class="contact-form">
                <form action="" method="post" onsubmit="return validate();">
                    <div class="form-group">
                        <input type="text" placeholder="Full Name" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Phone Number" name="phone" maxlength="12" pattern="[0-9]{10,12}" id="phone" required>
                    </div>
                    <div class="form-group">
                        <textarea rows="4" placeholder="Message" name="details" id="details" required></textarea>
                    </div>
                    <button type="submit">SEND</button>
                </form>
            </div>
        </div>
    </section>

    <section class="contact-info-section">
        <div class="contact-info-container">
            <div class="contact-info-box">
                <div class="icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="info">
                    <h5>Location</h5>
                    <p>Inuvil, Jaffna, Sri Lanka</p>
                </div>
            </div>
            <div class="contact-info-box">
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="info">
                    <h5>Email Address</h5>
                    <p>hello@petties.com</p>
                </div>
            </div>
            <div class="contact-info-box">
                <div class="icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div class="info">
                    <h5>Call Us</h5>
                    <p>(+94) 75 323 6060</p>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>
    <script src="js/main.js"></script>
</body>
</html>
