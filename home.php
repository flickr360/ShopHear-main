<?php
session_start();


include("constant.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $loginUsername = $_POST['loginUsername'];
  $loginPassword = $_POST['loginPassword'];

  if (!empty($loginUsername) && !empty($loginPassword)) {
      $query = "SELECT * FROM users WHERE username = ?";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("s", $loginUsername);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows == 1) {
          // Username exists, now check if the password matches
          $row = $result->fetch_assoc();
          $hashedPassword = $row['password'];
          $userId = $row['username'];

          if (password_verify($loginPassword, $hashedPassword)) {
          $_SESSION['login'] = true;
          $_SESSION['username'] = $row['username']; // Set the username in the session
          $_SESSION['user_id'] = $row['id']; // Assuming 'id' is the column name for the user ID in your database

          } else {
              echo '<script>alert("Incorrect password");</script>';
          }
      } else {
          echo '<script>alert("Username not found");</script>';
      }
  } else {
      echo '<script>alert("Please enter valid information");</script>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .landing-page {
    background-image: url('images/background.png');
    background-size: cover; 
    background-repeat: no-repeat;
    background-attachment: fixed; 
    color: white;
    text-align: left; 
    padding: 20% 5%; 
    margin-top: -70px; 
    height: 100vh;
  }
  </style>

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-purple">
    <div class="container-fluid">
    <img src="images/shophearlogo.gif" alt="Logo" class="navbar-logo super-small-logo">
      <a class="navbar-brand" href="#">ShopHear</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
     
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="index" href="#">Product</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" id="cart" href="#">Cart</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" id="about" href="#">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="landing-page">
    <div class="container">
      <h1 class="typewriter">SHOPHEAR</h1>
      <p class="write">we are HEAR for you</p>
    </div>
  </div>

    <div class="yellow-sectionn">
    <div class="container">
      <div class="row align-items-center">
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
</body>
</html>
<script>
        $(document).ready(function(){
            var urlParams = new URLSearchParams(window.location.search);
            var userId = urlParams.get('user_id');


            $("#index").click(function(){
                window.location.href = "index.php?user_id=" +userId;
            });

            $("#cart").click(function(){
                window.location.href = "cart.php?user_id=" +userId;
            });

            $("#about").click(function(){
                window.location.href = "about.php?user_id=" +userId;
            });
        });
    </script>