<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewellery_website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the POST data (cart items)
$inputData = file_get_contents("php://input");
$cartItems = json_decode($inputData, true);

// Check if the cart data is valid
if (empty($cartItems)) {
    echo json_encode(['status' => 'error', 'message' => 'No cart data received']);
    exit();
}

// Prepare and execute the SQL insert for each item in the cart
foreach ($cartItems as $item) {
    $productId = $item['id'];
    $productName = $item['name'];
    $productPrice = $item['price'];

    // Create SQL query to insert the cart item into the database
    $sql = "INSERT INTO cart (product_id, product_name, product_price) 
            VALUES ('$productId', '$productName', '$productPrice')";

    // Check if the query was successful
    if ($conn->query($sql) !== TRUE) {
        echo json_encode(['status' => 'error', 'message' => 'Error inserting data: ' . $conn->error]);
        exit();
    }
}

// If everything is successful, return a success response
echo json_encode(['status' => 'success', 'message' => 'Cart items added successfully']);

// Close the connection
$conn->close();
?>
