<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $petName = $_POST["pet-name"];
    $ownerName = $_POST["owner-name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $location = $_POST["loc"];
    $preferredDate = $_POST["appointment-date"];
    $preferredTime = $_POST["appointment-time"];
    $reason = $_POST["reason"];

    $sql = "INSERT INTO vet_booking_data (pet_name, owner_name, email, phone, location, preferred_date, preferred_time, reason) VALUES ('$petName', '$ownerName', '$email', '$phone', '$location', '$preferredDate', '$preferredTime', '$reason')";
    if ($conn->query($sql) === TRUE) {  
        echo "<script>
        window.location.href = 'pet-care.php';
        alert('Booking Successful!');
        </script>";

    } else {
        echo "<script>
        window.location.href = 'pet-care.php';
        alert('Booking Failed');
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
    <title>Petties</title>
    <link rel="stylesheet" type="text/css" href="css/services.css">
</head>
<body>
    <?php include('header.php'); ?>

    <main>
        <section class="book-vet">
            <h2>Book an <span>Appointment</span></h2>
            <p>Schedule an appointment with our trusted veterinarians for routine check-ups,</br> vaccinations, or any health concerns.</p>
            <form id="vet-booking-form" action="" method="post" onsubmit="return validate();">
                <div class="form-group">
                    <label for="pet-name">Pet Name</label>
                    <input type="text" id="pet-name" placeholder="Enter the pet name" name="pet-name" required>
                </div>
                <div class="form-group">
                    <label for="owner-name">Owner Name</label>
                    <input type="text" id="owner-name" placeholder="Enter your name" name="owner-name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" placeholder="Enter your phone number" maxlength="12" pattern="[0-9]{10,12}" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="loc">Location</label>
                    <input type="text" id="loc" placeholder="Enter your location details" name="loc" required>
                </div>
                <div class="form-group">
                    <label for="appointment-date">Preferred Date</label>
                    <input type="date" id="appointment-date" name="appointment-date" required>
                </div>
                <div class="form-group">
                    <label for="appointment-time">Preferred Time</label>
                    <input type="time" id="appointment-time" name="appointment-time" required>
                </div>
                <div class="form-group">
                    <label for="reason">Reason for Visit</label>
                    <select id="reason" name="reason" required>
                        <option>Pet Day Care</option>
                        <option>Pet Walking</option>
                        <option>Pet Grooming</option>
                        <option>Pet Meals</option>
                    </select>
                </div>
                <button type="submit" class="btn">Book</button>
            </form>
        </section>
    </main>
    <?php include('footer.php'); ?>
    <script src="js/main.js"></script>
</body>
</html>