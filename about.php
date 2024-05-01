<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
  <style>
    .section-content p {
      letter-spacing: 2px;
      text-align: center;
      font-size: 16px;
    }
    body{
        background-image: url(images/about-bg.png);
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        font-family: "Outfit", sans-serif;
      }
        #cart{
            margin-left: 10px;
            font-size: 40px;
        }
        #glasses{
            margin-left: 10px;
            font-size: 40px;
        }
        #home{
          margin-left: 10px;
          font-size: 40px;
        }
        #logout{
            margin-left: 10px;
            margin-right: 10px;
            font-size: 40px;
        }
        #about-button{
            font-size: 40px;
        }
        #about{
            margin-left: 10px;
            font-size: 40px;
        }
        .bi {
            margin-left: 10px; 
            margin-right: 10px; 
        }
        .navbar-brand {
            margin-left: 20px; 
        }
        .brandname{
            float: right;
            font-size: 30px;
            margin-left: 10px;
            margin-top: 3px;
            color: #ffffff;
        }
        .navbar{
            background-color: rgb(45, 27, 84);
            color: #ffffff;
            position: sticky;
            top: 0;
            z-index: 3;
        }
        
  </style>

<body>
<nav class="navbar navbar-light">
    <a class="navbar-brand" href="#">
        <img src="assets/logo.png" width="50" height="50">
        <h1 class="brandname">ShopHear</h1>
    </a>
    <div class="ml-auto">
    <a href="home.php?user_id=<?php if(isset($_GET['user_id'])) { echo $_GET['user_id']; } ?>" id="home">
            <i class="bi bi-house-fill"></i>
        </a>
        <a href="index.php?user_id=<?php if(isset($_GET['user_id'])) { echo $_GET['user_id']; } ?>" id="glasses">
            <i class="bi bi-emoji-sunglasses-fill" id="glasses-button"></i>
        </a>
        <a href="cart.php?user_id=<?php if(isset($_GET['user_id'])) { echo $_GET['user_id']; } ?>" id="cart">
            <i class="bi bi-bag-fill" id="cart-button"></i>
        </a> 
        <a href="about.php?user_id=<?php if(isset($_GET['user_id'])) { echo $_GET['user_id']; } ?>" id="about">
            <i class="bi bi-info-square-fill" id="about-button"></i>
        </a>
        <a href="logout.php">
            <i class="bi bi-box-arrow-left" id="logout"></i>
        </a>
    </div>
</nav>

  <div class="container mt-5">
    <section class="invisible-bg">
      <div class="section-title">
        <h2>About Shophear</h2>
      </div>
      <div class="section-content">
        <p>
          Welcome to Shophear, where fashion meets accessibility! We believe that everyone deserves to enjoy the beauty of stylish eyewear, regardless of their visual abilities. Our mission is to provide a seamless shopping experience for individuals with visual impairments, ensuring that they can effortlessly explore and discover the perfect pair of fashion glasses.
          <br><br> At Shophear, we understand the challenges faced by those with visual impairments when navigating online platforms. That's why we've integrated cutting-edge speech recognition technology into our website. This innovative feature allows our customers to navigate through our collection of fashion glasses, read product descriptions, and complete their purchase using voice commands. With speech recognition, browsing our website is not only convenient but also reduces eye strain, making the shopping experience more comfortable and enjoyable.
          <br><br> Our commitment to accessibility extends beyond technology. We offer a wide range of fashionable glasses designed to suit diverse styles and preferences. Whether you're looking for trendy frames, classic designs, or specialized eyewear, Shophear has something for everyone. Our team is dedicated to providing personalized assistance and support to ensure that every customer finds the perfect pair of glasses that not only enhances their style but also complements their lifestyle.
          <br><br> Join us at Shophear and discover a world where fashion and accessibility converge. Experience the convenience of speech recognition technology while exploring our exquisite collection of fashion glasses. Together, let's redefine the way individuals with visual impairments shop for eyewear, making accessibility and style accessible to all.</p>
      </div>
    </section>
    
    <section class="invisible-bg">
      <div class="section-title">
        <h2>Why ShopHear?</h2>
      </div>
      <div class="section-content">
        <p>When it comes to finding the perfect blend of accessibility and style, Shophear stands out as the ideal destination. Our name, Shophear, encapsulates our core values and unique offerings that set us apart in the world of fashion glasses and accessibility solutions.
          <br><br>
          First and foremost, Shophear is dedicated to inclusivity. We understand that individuals with visual impairments face unique challenges when it comes to shopping for eyewear. That's why we have curated a collection of fashion glasses that not only elevate your style but also prioritize comfort and functionality. From trendy frames to classic designs, our range ensures that everyone can find glasses that suit their personality and needs.
          <br><br>
          What truly sets Shophear apart is our commitment to accessibility innovation. We recognize the importance of making online shopping a seamless experience for individuals with visual impairments. That's why we have integrated state-of-the-art speech recognition technology into our website. This groundbreaking feature allows users to navigate our site, explore product details, and make purchases using simple voice commands. By harnessing the power of speech recognition, we empower our customers to shop independently and effortlessly, without straining their eyes.
          <br><br>
          Moreover, at Shophear, we believe in personalized support and assistance. Our team is dedicated to providing exceptional customer service, ensuring that every individual receives the guidance and information they need to make informed choices. Whether it's finding the right pair of glasses or understanding how our accessibility features work, we are here to help every step of the way.
          <br><br>
          Choosing Shophear means embracing a new era of accessibility and style. It means joining a community that values inclusivity, innovation, and customer satisfaction above all else. With Shophear, you can shop with confidence, knowing that your needs are our top priority and that you're part of a movement towards a more accessible and inclusive world.</p>
      </div>
    </section>

    <section class="invisible-bg">
      <div class="section-title">
        <h2>The Team</h2>
      </div>
      <div class="section-content">
        <div class="row">
          <div class="col-md-4 team-member">
            <img src="images/milacute.jpg" alt="Team Member 1">
            <h4>Ma. Milagros E. Abadinas</h4>
            <p>Role: Designer</p>
          </div>
          <div class="col-md-4 team-member">
            <img src="images/lloyd.jpg" alt="Team Member 2">
            <h4>Lloyd Aldrich A. Angara</h4>
            <p>Role: Developer</p>
          </div>
          <div class="col-md-4 team-member">
            <img src="images/rubymain.png" alt="Team Member 3">
            <h4>Ruby Ann S. Amate</h4>
            <p>Role: Marketing</p>
          </div>
        </div>
      </div>
    </section>
  </div>


  <footer class="footer">
    <div class="container footer-content">
      <p>&copy; 2024 Your Website</p>
      <div class="social-icons">
      <a href="https://www.facebook.com/mills.abadinas/"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com/home"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/mriamils_/"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
  <script>
        $(document).ready(function(){
    var urlParams = new URLSearchParams(window.location.search);
    var userId = urlParams.get('user_id');
    console.log("User ID:", userId);

    function goToHome() {
        console.log("Clicked home");
        window.location.href = "home.php?user_id=" + userId;
    }

    function goToIndex() {
        console.log("Clicked index");
        window.location.href = "index.php?user_id=" + userId;
    }

    function goToCart() {
        console.log("Clicked cart"); // Debugging line
        window.location.href = "cart.php?user_id=" + userId;
    }

    function goToAbout() {
        console.log("Clicked about");
        window.location.href = "about.php?user_id=" + userId;
    }

    $("#home").click(goToHome);
    $("#index").click(goToIndex);
    $("#cart").click(goToCart);
    $("#about").click(goToAbout);

    $(document).on('keydown', function(e) {
        if (!$(e.target).is('input, textarea')) {
            switch(e.key.toLowerCase()) {
                case 'h':
                    goToHome();
                    break;
                case 'p':
                    goToIndex();
                    break;
                case 'c':
                    goToCart();
                    break;
                case 'a':
                    goToAbout();
                    break;
                default:
            }
        }
    });
});
    </script>
</body>
</html>