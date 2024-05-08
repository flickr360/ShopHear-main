<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Order Form</title>
    <style>
        body{
            font-family: "Outfit", sans-serif;
            background-image: url("assets/cart-bg.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        body .form-container{
            justify-content: center;
            align-items: center;
            height: block;
            margin: auto;
            background-color: #BA90C6; 
        }
        .form-container {
            width: 300px;
            padding: 20px;
            background-color: rgba(208, 191, 255, 0.8); 
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .form-container h2{
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        .center-button {
            display: flex;
            justify-content: center;
        }

        input[type="submit"] {
            background-color: #540375;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #C04A82;
        }
        #cart{
            margin-left: 10px;
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
        .navbar-brand {
            margin-left: 20px; 
        }
        #cart-button{
            font-size: 40px;
            margin-left: 10px;
        }
        #glasses-button{
            font-size: 40px;
            margin-left: 10px;
        }
        #about-button{
            font-size: 40px;
            margin-left: 10px;
        }
        #about{
            margin-left: 10px;
            font-size: 40px;
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


    <div class="form-container mt-5">
        <h2>Order Form</h2>
        <form method="post" action="#" onsubmit="return validateForm()">
            <label for="full_name">Full Name:</label><br>
            <input type="text" id="full_name" name="full_name" required><br><br>

            <label for="phone_number">Phone Number:</label><br>
            <input type="text" id="phone_number" name="phone_number" required><br><br>

            <label>Payment Method:</label><br>
            <input type="checkbox" id="gcash" name="payment_method[]" value="GCash">
            <label for="gcash">GCash</label><br>
            <input type="checkbox" id="cod" name="payment_method[]" value="COD">
            <label for="cod">Cash on Delivery (COD)</label><br><br>

            <label for="address">Address:</label><br>
            <textarea id="address" name="address" required></textarea><br><br>

            <div class="center-button">
                <input type="submit" value="Submit Order">
            </div>
        </form>
    </div>

    <script>
    function validateForm() {
        const fullName = document.getElementById('full_name').value;
        const phoneNumber = document.getElementById('phone_number').value;
        const gcashChecked = document.getElementById('gcash').checked;
        const codChecked = document.getElementById('cod').checked;
        const address = document.getElementById('address').value;

        if (!fullName || !phoneNumber || (!gcashChecked && !codChecked) || !address) {
            alert('Please fill in all required fields and select a payment method.');
            return false; 
        }

        return true; 
    }

    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            event.preventDefault(); 
            if (validateForm()) {
                showSuccessMessage();
            }
        });

        function showSuccessMessage() {
            alert("Order Successful!");
            window.location.href = "home.php"; 
        }
    });
</script>


</body>
</html>
