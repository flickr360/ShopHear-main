<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        html, body{
            width: 100%;
            height: 100%;
            font-family: "Outfit", sans-serif;
            font-optical-sizing: auto;
            font-weight: 200;
            font-style: normal;
            color: #282828;
        }
        body {
            background-image: url("assets/cart-bg.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            background-color: rgba(255, 255, 255, 0.5); 
            backdrop-filter: blur(10px); 
            border-radius: 15px; 
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); 
        }
        th, td {
            border-bottom: 1px solid #dee2e6;
            padding: 15px;
            font-size: 20px;
        }
        th {
            background-color: rgba(255, 255, 255, 0.5); 
            backdrop-filter: blur(10px); 
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); 
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .edit-btn, .delete-btn, .order-btn {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 3px;
        }
        .edit-btn:hover, .delete-btn:hover, .order-btn:hover {
            background-color: #0056b3;
        }
        .order-btn {
            display: block;
            width: 100%;
        }
        @media (max-width: 576px) {
            .container {
                padding: 15px;
            }
            table {
                font-size: 14px;
            }
            th, td {
                padding: 10px;
            }
        }
        tr{
            text-align: center; 
            justify-content: center;
            align-items: center;
        }
        td[colspan="4"] {
            text-align: left;
        }
        .navbar-brand {
            margin-left: 20px; 
        }
        #cart-button{
            font-size: 40px;
        }
        #glasses-button{
            font-size: 40px;
        }
        #about-button{
            font-size: 40px;
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
        .cart{
            color: #ffffff;
        }
        .cartlb{
            color: #ffffff;
        }
        .order-checkbox {
        width: 20px;
        height: 20px;
        }
        .bi {
        margin-left: 10px; 
        margin-right: 10px; 
        }
        .edit-btn,
        .order-btn {
            padding: 8px 16px;
            background-color: #642a94;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .edit-btn:hover,
        .order-btn:hover {
            background-color: #240d35;
        }
        .delete-btn{
            padding: 8px 16px;
            background-color: #CD2E2E;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .delete-btn:hover{
            background-color: #952424;
        }
        #cart{
            margin-left: 10px;
            text-decoration: none;
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


    <div class="container">
        <h1 class="cartlb">Cart:</h1>
        <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Picture</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php

                include("constant.php");

                $link = mysqli_connect("localhost", "root", "", "hci");
                if ($link === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                $totalBill = 0;

                if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
                    $userId = $_GET['user_id'];
                    $sql = "SELECT * FROM transaction WHERE user_id = '$userId'";
                    $result = mysqli_query($link, $sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td><input type="checkbox" class="order-checkbox"></td>';
                            echo '<td><img src="assets/' . $row['item'] . '.png" alt="glass picture" style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px;"></td>';
                            echo '<td>' . $row['item'] . '</td>';
                            echo '<td>' . $row['quantity'] . '</td>';
                            echo '<td>' . $row['total'] . '</td>';
                            echo '<td>';
                            echo '<button class="delete-btn" data-id="' . $row['id'] . '">Delete</button>';
                            echo '</td>';
                            echo '</tr>';

                            $totalBill += $row['total'];
                        }
                    } else {
                        echo '<tr><td colspan="6">No items in the cart.</td></tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">ERROR: Could not execute query: ' . $sql . '. ' . mysqli_error($link) . '</td></tr>';
                }

                echo '<tr id="totalBillRow">';
                echo '<td colspan="4">Total Bill:</td>';
                echo '<td id="totalBillAmount" colspan="1">' . $totalBill . '</td>';
                echo '<td>';
                echo '<button class="order-btn" id="orderNowBtn" >Order Now</button>';
                echo '<button class="delete-btn" onclick="deleteSelectedItems()">Delete Selected Items</button>';
                echo '</td>';
                echo '</tr>';

                mysqli_close($link);
                }

                ?>
            </tbody>
        </table>
            </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
            console.log("Clicked cart");
            window.location.href = "cart.php?user_id=" + userId;
        }

        function goToAbout() {
            console.log("Clicked about");
            window.location.href = "about.php?user_id=" + userId;
        }

        $("#home").click(goToHome);
        $("#glasses").click(goToProduct);
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

    function deleteSelectedItems() {
        var selectedItems = [];
        $('.order-checkbox:checked').each(function() {
            selectedItems.push($(this).closest('tr').find('.delete-btn').data('id'));
        });

        if (selectedItems.length === 0) {
            alert('No item was selected.');
            return; 
        }

        if (confirm('Are you sure you want to delete all selected items?')) {
            selectedItems.forEach(function(itemId) {
                $.ajax({
                    url: 'delete-item.php',
                    type: 'POST',
                    data: { id: itemId },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('An error occurred while deleting the item. Please try again later.');
                    }
                });
            });
        }
    }

    $('.delete-btn').click(function(){
        var itemId = $(this).data('id');
        if(confirm('Are you sure you want to delete this item?')){
            $.ajax({
                url: 'delete-item.php',
                type: 'POST',
                data: { id: itemId },
                success: function(response){
                    location.reload();
                },
                error: function(xhr, status, error){
                    console.error('Error:', error);
                    alert('An error occurred while deleting the item. Please try again later.');
                }
            });
        }
    });

    $(document).ready(function() {
        function updateTotalBill() {
            var totalBill = 0;
            $('.order-checkbox:checked').each(function() {
                var itemPrice = parseFloat($(this).closest('tr').find('td:eq(4)').text());
                totalBill += itemPrice;
            });
            $('#totalBillAmount').text(totalBill.toFixed(2)); 
            localStorage.setItem('totalBill', totalBill);
        }

        updateTotalBill();

        $('.order-checkbox').change(function() {
            updateTotalBill(); 
        });

        $('#orderNowBtn').click(function() {
            var selectedItems = [];
            $('.order-checkbox:checked').each(function() {
                selectedItems.push($(this).closest('tr').find('.edit-btn').data('id'));
            });

            if (selectedItems.length === 0) {
                alert('No item was selected.');
                return;
            }
            var urlParams = new URLSearchParams(window.location.search);
            var userId = urlParams.get('user_id');

            window.location.href = "order.php?user_id=" + userId;
        });
    });
    </script>
</body>
</html>