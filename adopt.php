<?php
// Include database connection
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $petType = $_POST["pet-type"];
    $reason = $_POST["reason"];

    // Insert form data into the database
    $sql = "INSERT INTO adoption_data (name, email, phone, address, pet_type, reason) VALUES ('$name', '$email', '$phone', '$address', '$petType', '$reason')";
    if ($conn->query($sql) === TRUE) {  
        echo "<script>
        window.location.href = 'pet-care.php';
        alert('Submitted Successful!');
        </script>";    
    } 
    else {
        echo "<script>
        window.location.href = 'pet-care.php';
        alert('adoption Failed');
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
    <title>Adopt - Petties</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="css/adopt-styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include('header.php'); ?>
    <main>
        <section class="adopt-section">
            <h1>Adopt a <span>Pet</span></h1>
            <p>Give a loving home to a furry companion and change a life forever.</p>
 
            <div id="adoption-form">
                <h2>Adoption Application</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" placeholder="Enter your name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" placeholder="Enter your phone number" name="phone" maxlength="12" pattern="[0-9]{10,12}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" placeholder="Enter your address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pet-type">Dog Breed</label>
                        <select id="pet-type" name="pet-type" required>
                            <option>Pet Day Care</option>
                            <option>Pet Walking</option>
                            <option>Pet Grooming</option>
                            <option>Pet Meals</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="reason">Reason for Adoption</label>
                        <textarea id="reason" name="reason" placeholder="Give your reason" required></textarea>
                    </div>
                    <button type="submit" class="btn">SEND</button>
                </form>
            </div>
        </section>
    </main>
    <?php include('footer.php'); ?>
    <script src="js/main.js"></script>
</body>
</html>