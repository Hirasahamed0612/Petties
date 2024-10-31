<?php

include 'db_connect.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Petties</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="rectangle-section">
        <div class="left-content">
            <h2 class="N1">Give A Home For </h2> <h2 class="N2">Your Street Friend</h2>
            <p>Where every street dog’s dream becomes a reality, and every pet parent finds their happy place.</p>
          <a href="adoption.php"><button class="rectangle-button">ADOPT A PET</button></a> 
        </div>
        <div class="right-content">
            <img src="images/bone (1) 2.png" class="b1">
            <img src="images/dog01 2.png" class="dog-main" alt="Descriptive Alt Text">
            <img src="images/bone (1) 1.png" class="b2">
        </div>
    </div>

    <section class="greeting-section">
        <div class="greeting-heading">
            <img src="images/group 7.png" alt="Left Image" class="left-image">
            <h2>Warm <span>Greeting inviting<br/> visitors</span> to explore the site</h2>
            <img src="images/group.png" alt="Right Image" class="right-image">
        </div>
        <div class="box-container">
            <div class="box">
                <img src="images/dog01.png" alt="Box Image 1" class="box-image">
                <h3>Friendly</h3>
                <h4>Charlie</h4>
                <p>Birth: Dec 2023</p>
                <div class="stars">
                    <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9734;</span>
                </div>
            </div>
            <div class="box">
                <img src="images/dog02.png" alt="Box Image 2" class="box-image">
                <h3>Funny</h3>
                <h4>Tartosh</h4>
                <p>Birth: Jan 2023</p>
                <div class="stars">
                    <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9734;</span>
                </div>
            </div>
            <div class="box">
                <img src="images/dog03.png" alt="Box Image 3" class="box-image">
                <h3>Happy</h3>
                <h4>Max</h4>
                <p>Birth: July 2023</p>
                <div class="stars">
                    <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9734;</span>
                </div>
            </div>
        </div>
    </section>

<section class="how-adoption-works">
    <div class="container">
        <div class="left-side">
            <img src="images/lady.png" alt="Adoption Image">
        </div>
        <div class="right-side">
            <h2>How<span> Adoption </span>Works!</h2>
            <p>Clear instructions on how to apply for adoption, including an online application form and contact information for inquiries.</p>
            <ul>
                <li>Find a Pet you wish to Take Home.</li>
                <li>Go through our adoption requirements and checklist.</li>
                <li>Schedule a visit with the shelter.</li>
                <li>Meet the Pet and complete the Procedure.</li>
            </ul>
            <button class="faq-btn">FAQ</button>
        </div>
    </div>
</section>


    <section class="latest-tips-news">
    <h2>Latest <span>Tips</span> and <span>News</span></h2>
    <div class="tips-news">
        <div class="tip-card">
            <h3>Nutrition and Diet</h3>
            <p>Provide guidance on selecting the right food for your dog’s breed, age, and size. Offer tips on portion control avoiding harmful ingredients, and incorporating health treats.</p>
        </div>
        <div class="tip-card">
            <h3>Grooming and Hygiene</h3>
            <p>Offer tips on regular grooming practices, including brushing, bathing, and nail trimming.</p>
        </div>
        <div class="tip-card">
            <h3>Grooming Events and Activities</h3>
            <p>Share information about upcoming dog friendly events, such as pet expos, dog shows, and adoption drives.</p>
        </div>
        <div class="tip-card">
            <h3>Trends in Dog Products and Services</h3>
            <p>Trends in pet technology, such as smart collars, <br>GPS trackers, and pet cameras.</p>
        </div>
    </div>
</section>

<section class="about">
    <div class="about-header">
        <h2>About <span>Petties</span></h2>
        <img src="images/group 7.png" class="paw">
    </div>
    <div class="about-content">
        <p>At our dog shelter, we rescue, rehabilitate, and rehome dogs in need. Our dedicated team provides
        love, care, and essential veterinary services to every burry resident. With your support, we strive to give
        each dog a second chance at a forever home filled with love and happiness.</p>
        <img src="images/dog-family.png" class="dog-group">
    </div>
</section>
</main>
 <?php include 'footer.php'; ?>

<script src="js/main.js"></script>
</body>
</html>