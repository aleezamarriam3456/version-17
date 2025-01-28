<?php
namespace Models;

use Config\Database;

class User {
    protected $conn;
    protected $fullName;
    protected $email;
    protected $password;
    protected $role;

    public function __construct($fullName, $email, $password, $role) {
        $this->conn = Database::getInstance();
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function register() {
        // Check if the email already exists
        $stmt = $this->conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->execute([$this->email]);
        
        if ($stmt->rowCount() > 0) {
            return "Email already exists.";
        }

        // Hash the password for security
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        
        // Insert the user into the database
        // Ensure the correct columns are specified
        $stmt = $this->conn->prepare("INSERT INTO users (full_name, email, password, role, created_at) VALUES (?, ?, ?, ?, NOW())");
        
        // Corrected line: ensure the parameters match the columns in the INSERT statement
        if ($stmt->execute([$this->fullName, $this->email, $hashedPassword, $this->role])) {
            return true; // Registration success
        } else {
            return "Error: Could not execute the query.";
        }
    }
}
?>
