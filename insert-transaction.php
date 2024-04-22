<?php
include_once "constant.php";
session_start();

if (isset($_POST['itemName'], $_POST['quantity'], $_POST['totalCost'])) {

    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $item = $_POST['item'];
        $quantity = intval($_POST['quantity']);
        $totalCost = intval($_POST['totalCost']); 

        $stmt = $link->prepare("SELECT id FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {

            $row = $result->fetch_assoc();
            $userId = $row['id'];

            $stmt = $link->prepare("INSERT INTO transactions (user_id, quantity, item, total_price) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $userId, $quantity, $item, $totalCost);
            $stmt->execute();
            $stmt->close();

            echo $quantity . " " . $item . " has been added to cart.";
        } else {
            echo "Invalid user.";
        }
    } else {
        echo "User not logged in.";
    }
}
?>