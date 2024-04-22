<?php
// Check if itemName, quantity, payment, total, and excess are set in the POST request
if (isset($_POST['itemName']) && isset($_POST['quantity']) && isset($_POST['payment']) && isset($_POST['total']) && isset($_POST['excess'])) {
    // Get itemName, quantity, payment, total, and excess from the POST request
    $itemName = $_POST['itemName'];
    $quantity = $_POST['quantity'];
    $payment = $_POST['payment'];
    $total = $_POST['total'];
    $excess = $_POST['excess'];
    
    // Connect to your database (modify this according to your database configuration)
    $link = mysqli_connect("localhost", "root", "", "hci");
    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    // Prepare an insert statement
    $sql = "INSERT INTO transaction (quantity, item, payment, total, excess) VALUES (?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "issss", $quantity, $itemName, $payment, $total, $excess);
        
        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Item added to cart successfully.";
        } else {
            echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
    }
    
    // Close connection
    mysqli_close($link);
} else {
    // If itemName, quantity, payment, total, and excess are not set in the POST request
    echo "ERROR: Missing parameters.";
}
?>
