<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="homepage.css">
  <style>
    
@import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Lilita+One&display=swap');
body {
  font-family: "Outfit", sans-serif; !important;
            font-optical-sizing: auto;
            font-weight: 200;
            font-style: normal; 
    background-color: #F3C9F9;
    background-image: url(images/home-bg.png);
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat;
    margin-top: -200px; 
    height: 50vh; 
    margin: 0; 
    padding: 0; 
}
@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
.nav-logo {
    color: white !important;
    animation: fadeIn 0.5s ease-in-out forwards;
    font-weight: bold;
    font-size: 1.5rem;
}

.nav-item {
    margin-right: 50px; 
    font-size: 1rem;
}

.one {
    animation: fadeIn 1.0s ease-in-out forwards;
}
.two {
    animation: fadeIn 1.5s ease-in-out forwards;
}
.three {
    animation: fadeIn 2.0s ease-in-out forwards;
}
.four {
    animation: fadeIn 2.5s ease-in-out forwards;
}

.navbar-nav .nav-link {
    color: white !important; 
}

.navbar {
    position: fixed; 
    width: 100%; 
    top: 0; 
}

.container {
    margin-top: 20px;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

.containertwo {
    justify-content: center;
    margin-top: 450px;
    color: white;
    text-align: center; 
}

.title {
    font-weight: bold;
    font-size: 5.0rem;
    margin-bottom: 10px;
}

@keyframes colorAnimation {
    0% { color: white; }
    33% { color: pink; }
    66% { color: yellow; }
    100% { color: white; }
}

.description {
    animation: colorAnimation 4s infinite;
    font-family: "Comfortaa", sans-serif;
    font-weight: 1000;
    font-size: 1.5rem;
    margin-bottom: 20px;
}

.btn-info {
    font-weight: 500;
    margin-bottom: 70px;
    background-color: white; 
    color: #6a0dad; 
    padding: 10px 20px;
    font-size: 1.2rem;
    border: 1px solid white; 
    border-radius: 80px;
    transition: all 0.3s ease;
}

.btn-info:hover {
    background-color: #49217d; 
    color: white; 
}

/* New Purple Section */
.purple-section {
    background-color: #F3C9F9;
    position: relative;
    z-index: 1; 
    color: #fff;
    padding: 50px 0;
    text-align: center;
}
.yellow-text{
    font-weight: bold;
    letter-spacing: 3px;
    color: #000;
    font-size: 18px;
    text-align: left;
}
@media only screen and (max-width: 768px) {
    .yellow-text {
        font-size: 14px; 
        letter-spacing: 2px; 
    }
}

@media only screen and (max-width: 480px) {
    .yellow-text {
        font-size: 14px; 
        letter-spacing: 1px; 
    }
}

/* Footer Styling */
 .footer {
    background-color: #333;
    color: white;
    padding: 20px 0;
    bottom: 0; 
    width: 100%; 
  }
  .footer-content {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .footer-content p {
    margin: 0;
  }
  .social-icons {
    margin-left: 10px;
  }
  .social-icons a {
    color: white;
    margin-right: 10px;
  }
  

    body{
      font-family: "Outfit", sans-serif;
    }
    .landing-page {
    background-image: url('images/background.png');
    background-size: cover; 
    background-repeat: no-repeat;
    background-attachment: fixed; 
    color: white;
    text-align: left; 
    padding: 20% 5%; 
    height: 100vh;
  }

  .container{
        }
        #cart-button{
            font-size: 30px;
        }
        .navbar{
            background-color: rgb(45, 27, 84);
            color: #ffffff;
            position: sticky;
            top: 0;
            z-index: 3;
        }
        .brandname{
            float: right;
            font-size: 30px;
            margin-left: 10px;
            margin-top: 3px;
            color: #ffffff;
        }
        #cart-button{
            font-size: 40px;
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
        #about{
            margin-left: 10px;
            margin-right: 10px;
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

        .footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            bottom: 0; 
            width: 100%; 
        }
        .footer-content {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .footer-content p {
            margin: 0;
        }
        .social-icons {
            margin-left: 10px;
        }
        .social-icons a {
            color: white;
            margin-right: 10px;
        }
        .ml-auto{
            display: flex;
        }
        a{
          color: white;
        }
        a:hover{
          color: gray;
        }
  
  </style>

</head>
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
        <a href="product.php?user_id=<?php if(isset($_GET['user_id'])) { echo $_GET['user_id']; } ?>" id="glasses">
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

<div class="wrapper">
        <div class="containertwo">
            <h1 class="title">Welcome to SHOPHEAR</h1>
            <p class="description">we are HEAR for you</p>
            <a href="#purpleSection" class="btn btn-info">more info</a> 
        </div>
    </div>
    <div class="purple-section" id="purpleSection"> 
        <div class="container">
            <div class="row align-items-center please">
              <div class="col-md-6">
                <img src="images/model.gif" alt="Image Description" class="img-fluid smaller-image">
              </div>
              <div class="col-md-6">
                <div class="rounded p-4 yellow-text-bg">
            
                  <div class="yellow-text">
                  <p>Step into our world of carefully chosen products designed to enhance your hearing and sight. Our collection is all about making sure you hear every sound clearly and see everything with sharpness and clarity, making your daily experiences more enjoyable.</p>
                  <p>Our team is dedicated to providing personalized support that's just right for you. We understand that everyone's journey to better hearing and vision is unique, so we're here to guide you every step of the way. You'll find our friendly guide to make your experience smooth and hassle-free.</p>
                  <p>Together, let's embark on a journey towards improved sensory experiences. Discover how our products can make a difference in your daily life, bringing you closer to a world filled with clear sights and sounds that uplift your spirit and enrich your days.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // JavaScript to scroll to the purple section when the button is clicked
        document.querySelector('.btn-info').addEventListener('click', function() {
            document.querySelector('.purple-section').scrollIntoView({ behavior: 'smooth' });
        });
    </script>
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

    function goToProduct() {
        console.log("Clicked index");
        window.location.href = "product.php?user_id=" + userId;
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
    $("#product").click(goToProduct);
    $("#cart").click(goToCart);
    $("#about").click(goToAbout);

    $(document).on('keydown', function(e) {
        if (!$(e.target).is('input, textarea')) {
            switch(e.key.toLowerCase()) {
                case 'h':
                    goToHome();
                    break;
                case 'p':
                    goToProduct();
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

<footer class="footer">
    <div class="container footer-content">
      <p>&copy; 2024 ShopHear</p>
      <div class="social-icons">
        <a href="https://www.facebook.com/mills.abadinas/"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com/home"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/mriamils_/"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>

</html>