<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Cart Items</title>
    <!-- Add any CSS or external libraries here -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .edit-btn, .delete-btn {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .edit-btn:hover, .delete-btn:hover {
            background-color: #45a049;
        }
        .order-btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .order-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Select</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Payment</th>
            <th>Total</th>
            <th>Excess</th>
            <th>Action</th>
        </tr>
        <?php
        session_start();
        include("constant.php");

        $link = mysqli_connect("localhost", "root", "", "hci");
        if ($link === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Attempt select query execution
        $sql = "SELECT * FROM transaction";
        $result = mysqli_query($link, $sql);
        if ($result) {
            // Check if there are rows returned
            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td><input type="checkbox" class="order-checkbox"></td>';
                    echo '<td>' . $row['item'] . '</td>';
                    echo '<td>' . $row['quantity'] . '</td>';
                    echo '<td>' . $row['payment'] . '</td>';
                    echo '<td>' . $row['total'] . '</td>';
                    echo '<td>' . $row['excess'] . '</td>';
                    echo '<td>';
                    echo '<button class="edit-btn" data-id="' . $row['id'] . '">Edit</button>';
                    echo '<button class="delete-btn" data-id="' . $row['id'] . '">Delete</button>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="7">No items in the cart.</td></tr>';
            }
        } else {
            echo '<tr><td colspan="7">ERROR: Could not execute query: ' . $sql . '. ' . mysqli_error($link) . '</td></tr>';
        }

        // Close connection
        mysqli_close($link);
        ?>
    </table>
    
    <button class="order-btn" id="orderNowBtn">Order Now</button>

    <!-- Add any additional HTML content or scripts here -->
    <script>
        // Add JavaScript for handling edit and delete actions
        $(document).ready(function(){
            // Edit button click event
            $('.edit-btn').click(function(){
                var itemId = $(this).data('id');
                // Redirect to edit page with itemId
                window.location.href = 'edit.php?id=' + itemId;
            });

            // Delete button click event
            $('.delete-btn').click(function(){
                var itemId = $(this).data('id');
                // Confirm delete action
                if(confirm('Are you sure you want to delete this item?')){
                    // AJAX call to delete.php with itemId
                    $.ajax({
                        url: 'delete-item.php',
                        type: 'POST',
                        data: { id: itemId },
                        success: function(response){
                            // Reload the page after successful delete
                            location.reload();
                        },
                        error: function(xhr, status, error){
                            console.error('Error:', error);
                            alert('An error occurred while deleting the item. Please try again later.');
                        }
                    });
                }
            });

            // Order Now button click event
            $('#orderNowBtn').click(function(){
                // Get the IDs of selected items
                var selectedItems = [];
                $('.order-checkbox:checked').each(function(){
                    selectedItems.push($(this).closest('tr').find('.edit-btn').data('id'));
                });
                // Redirect to order page with selected item IDs
                window.location.href = 'order.php?items=' + selectedItems.join(',');
            });
        });
    </script>
</body>
</html>
