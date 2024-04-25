<?php
session_start();
?>

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
            background-color: rgba(255, 255, 255, 0.5); /* Add transparency */
            backdrop-filter: blur(10px); /* Add blur effect */
            border-radius: 15px; /* Add border radius */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Add shadow */
        }
        th, td {
            border-bottom: 1px solid #dee2e6;
            padding: 15px;
            font-size: 20px;
        }
        th {
            background-color: rgba(255, 255, 255, 0.5); /* Add transparency */
            backdrop-filter: blur(10px); /* Add blur effect */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Add shadow */
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
            font-size: 30px;
        }
        #glasses-button{
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
        .delete-btn,
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
        .delete-btn:hover,
        .order-btn:hover {
            background-color: #240d35
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
        <a href="index.php?user_id=<?php echo $_GET['user_id']; ?> ">
            <i class="bi bi-eyeglasses" id="glasses-button"></i>
        </a>
        <a href="logout.php">
            <button>logout</button>
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
                // Include necessary files and establish database connection

                include("constant.php");

                $link = mysqli_connect("localhost", "root", "", "hci");
                if ($link === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                if (!isset($_SESSION['username'])) {
                    header('Location: login.php');
                    exit;
                }

                $totalBill = 0;

                if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
                    $userId = $_GET['user_id'];
                    $sql = "SELECT * FROM transaction WHERE user_id = '$userId'";
                    $result = mysqli_query($link, $sql);
                if ($result) {
                    // Check if there are rows returned
                    if (mysqli_num_rows($result) > 0) {
                        // Output data of each row
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
                echo '<button class="order-btn" id="orderNowBtn">Order Now</button>';
                echo '<button onclick="deleteSelectedItems()">Delete Selected Items</button>';
                echo '</td>';
                echo '</tr>';

                mysqli_close($link);
                }

                // Attempt select query execution
                
                ?>
            </tbody>
        </table>
            </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
            function deleteSelectedItems() {
        var selectedItems = [];
        $('.order-checkbox:checked').each(function() {
            selectedItems.push($(this).closest('tr').find('.delete-btn').data('id'));
        });

        // Check if no item was selected
        if (selectedItems.length === 0) {
            alert('No item was selected.');
            return; // Stop further execution
        }

        // Confirm deletion
        if (confirm('Are you sure you want to delete all selected items?')) {
            // Loop through each selected item ID and initiate AJAX request to delete it
            selectedItems.forEach(function(itemId) {
                $.ajax({
                    url: 'delete-item.php',
                    type: 'POST',
                    data: { id: itemId },
                    success: function(response) {
                        // Reload the page after successful deletion
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
    // Function to update the total bill amount
    function updateTotalBill() {
        var totalBill = 0;
        $('.order-checkbox:checked').each(function() {
            var itemPrice = parseFloat($(this).closest('tr').find('td:eq(4)').text());
            totalBill += itemPrice;
        });
        $('#totalBillAmount').text(totalBill.toFixed(2)); // Update the total bill amount
        // Update totalBill in localStorage
        localStorage.setItem('totalBill', totalBill);
    }

    // Initial call to update total bill amount
    updateTotalBill();

    $('.order-checkbox').change(function() {
        updateTotalBill(); // Call the function to update the total bill amount
    });

    $('#orderNowBtn').click(function() {
        var selectedItems = [];
        $('.order-checkbox:checked').each(function() {
            selectedItems.push($(this).closest('tr').find('.edit-btn').data('id'));
        });

        // Check if no item was selected
        if (selectedItems.length === 0) {
            alert('No item was selected.');
            return; // Stop further execution
        }

        window.location.href = 'order.php?items=' + selectedItems.join(',');
    });
});



    </script>
</body>
</html>
