<?php
session_start();
include('jewellery_website'); // Include your database connection

// Get product ID from POST data
$product_id = $_POST['product_id'];

// Establish database connection
$conn = Config\Database::getInstance();

// Delete the product from the cart
$query = "DELETE FROM cart WHERE product_id = :product_id";
$stmt = $conn->prepare($query);
$stmt->execute(['product_id' => $product_id]);

// Send success response
echo "Product removed from cart!";
?>
