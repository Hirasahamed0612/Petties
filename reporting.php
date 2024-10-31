<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $behavior = $_POST["behavior"];
    $reason = $_POST["reason"];

    $sql = "INSERT INTO report (name, phone, address, behavior, reason) VALUES ('$name', '$phone', '$address', '$behavior', '$reason')";
    if ($conn->query($sql) === TRUE) {  
        echo "<script>
        window.location.href = 'reporting.php';
        alert('Submitted Successful!');
        </script>";    
    } 
    else {
        echo "<script>
        window.location.href = 'reporting.php';
        alert('Adoption Failed');
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
            <h1>Street Dog <br><span>Reporting Form</span></h1> 
            <div id="adoption-form">
                <h2>Street Dog Information</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" placeholder="Enter your name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" placeholder="Enter your phone number" maxlength="12" pattern="[0-9]{10,12}" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Location</label>
                        <input type="text" id="address" name="address" placeholder="Enter your Location" required>
                    </div>
                    <div class="form-group">
                        <label for="behavior">Behavior of the street dog</label>
                        <select id="behavior" name="behavior" required>
                            <option>Friendly</option>
                            <option>Scared</option>
                            <option>Aggressive </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="reason">Description of the street dog</label>
                        <textarea id="reason" name="reason" placeholder="Mention your problem" required></textarea>
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