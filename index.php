<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopHear</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        body {
            background-color: #fff;
        }

        .fullscreen-img {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .fullscreen-img img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        .instructions{
          justify-content: center;
          align-items: center;
          text-align: center;
          font-weight: bold;
          color: black !important;
          display: inline-block;
        }
    </style>
</head>

<body>
    <div class="fullscreen-img">
        <a href="login.php">
            <img src="images/shophear.gif" alt="ShopHear">
        </a>
        <div class="instructions">
                  <h1>INSTRUCTIONS:</h1>
                  <h1>PRESS "H"  TO GO TO HOMEPAGE</h1>
                  <h1>PRESS "P" TO GO TO OUR PRODUCTS</h1>
                  <h1>PRESS "C" TO GO TO CART</h1>
                  <h1>PRESS "A" TO GO TO OUR ABOUT PAGE</h1>
                  <h1>PRESS "SPACEBAR" TO CONTINUE</h1>
         </div>
    </div>
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var imageLink = document.querySelector('.fullscreen-img a');
        imageLink.addEventListener('click', function (event) {
            event.preventDefault(); 
            window.location.href = imageLink.href; 
        });
        document.addEventListener('keydown', function(event) {
        if (event.key === ' ') { // Check if the pressed key is the spacebar
            window.location.href = imageLink.href; // Navigate to the same page
        }
    }); 
    </script>
</body>

</html>