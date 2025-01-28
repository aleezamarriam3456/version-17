<?php
// Include the database connection file
require 'config/Database.php';
require 'models/User.php';

use Config\Database;
use Models\User;

$conn = Database::getInstance(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    // Validate inputs
    $errors = [];

    if (empty($email) || empty($password)) {
        $errors[] = "Both email and password are required.";
    }

    // If there are no errors, proceed to login
    if (empty($errors)) {
        // Prepare SQL statement to find the user
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Start session and store user information
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];

                // Redirect based on user role
                switch ($user['role']) {
                    case 'admin':
                        header("Location: ../frontend/admin.html"); // Redirect to Admin Dashboard
                        break;
                    case 'supplier':
                        header("Location: ../frontend/supplier.html"); // Redirect to Supplier Dashboard
                        break;
                    default:
                        header("Location: ../frontend/home.html"); // Redirect to Customer/Home Page
                        break;
                }
                exit();
            } else {
                $errors[] = "Incorrect password.";
            }
        } else {
            $errors[] = "No user found with this email.";
        }
        
        // Close statement
        $stmt->closeCursor();
    }

    // Display errors if any
    foreach ($errors as $error) {
        echo "<script>alert('$error');</script>";
    }
}
echo "<script>setTimeout(function() { window.location.href = '../frontend/login.html'; }, 0);</script>";
exit();
?>
