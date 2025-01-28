<?php
session_start();
include('jewellery_website'); // Include your database connection

// Get the total amount from the front end (passed as POST data)
$total_amount = $_POST['total']; // This should be calculated in the frontend or passed in the request

// Establish database connection
$conn = Config\Database::getInstance();

try {
    // Insert order into the orders table
    $query = "INSERT INTO orders (total_amount, order_date) VALUES (:total_amount, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->execute(['total_amount' => $total_amount]);
    $order_id = $conn->lastInsertId(); // Get the last inserted order ID

    // Fetch items from the cart
    $query = "SELECT * FROM cart";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $cart_items = $stmt->fetchAll();

    // Insert items into the order_details table
    foreach ($cart_items as $item) {
        $query = "INSERT INTO order_details (order_id, product_id, product_name, product_price, quantity) 
                  VALUES (:order_id, :product_id, :product_name, :product_price, :quantity)";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            'order_id' => $order_id,
            'product_id' => $item['product_id'],
            'product_name' => $item['product_name'],
            'product_price' => $item['product_price'],
            'quantity' => $item['quantity']
        ]);
    }

    // Clear the cart after placing the order
    $query = "DELETE FROM cart";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Send a success response back to JavaScript
    echo "Order placed successfully!";
} catch (PDOException $e) {
    // If there was an error, send an error message
    echo "Error: " . $e->getMessage();
}
?>
