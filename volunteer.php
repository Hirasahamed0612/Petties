<?php
include 'db_connect.php';

$success = false;
$emailExists = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $volunteeringArea = $_POST["volunteering-area"];

    $checkEmailSql = "SELECT * FROM volunteering_application_data WHERE email='$email'";
    $result = $conn->query($checkEmailSql);

    if ($result->num_rows > 0) {
        $emailExists = true;
    } else {
        $sql = "INSERT INTO volunteering_application_data (name, email, phone, volunteering_area) VALUES ('$name', '$email', '$phone', '$volunteeringArea')";
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
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Involved - Petties</title>
    <link rel="stylesheet" type="text/css" href="css/links.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include('header.php'); ?>
    <main>
        <section class="hero-section">
            <h1>Volunteer <span>Opportunities</span></h1>
            <p>Volunteers are the backbone of our organization.</br> Your time and effort make a real difference in the lives of homeless animals.</p>
        </section>
        <section class="volunteer-section">
            <div class="volunteer-container">
                <div class="volunteer-form" id="volunteer-form">
                    <h3>Volunteer Application</h3>
                    <p>Join our mission to provide loving homes and care for pets in need.</p>
                    <form action="" method="post" onsubmit="return validate();">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" placeholder="Enter your name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Enter your email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" placeholder="Enter your phone number" maxlength="12" pattern="[0-9]{10,12}" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="volunteering-area">Volunteering Area</label>
                            <select id="volunteering-area" name="volunteering-area" required>
                                <option value="">Select an option</option>
                                <option value="animal-care">Animal Care</option>
                                <option value="foster-care">Foster Care</option>
                                <option value="adoption-events">Adoption Events</option>
                                <option value="fundraising">Fundraising</option>
                                <option value="administrative">Administrative</option>
                            </select>
                        </div>
                        <button type="submit" class="btn">SEND</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php include('footer.php'); ?>
    <script src="js/main.js"></script>
</body>
</html>
