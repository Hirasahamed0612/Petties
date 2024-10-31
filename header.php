<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo">Petties</div>
            <button class="menu-icon" aria-label="Toggle menu" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-links">
                <li><a href="index.php">HOME</a></li>
                <li><a href="adoption.php">ADOPTION</a></li>
                <li><a href="services.php">SERVICES</a></li>
                <li><a href="reporting.php">REPORT</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="volunteer.php" class="volunteer-btn">JOIN US</a></li>
            </ul>
        </nav>
    </header>
    <script src="js/main.js"></script>
</body>
</html>
