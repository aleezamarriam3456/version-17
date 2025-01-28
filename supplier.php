<?php
namespace Models;

require_once 'User.php'; // Include the base User class

class Supplier extends User {
    private $dashboardLink;

    public function __construct($fullName, $email, $password, $role, $dashboardLink = "../frontend/supplier_page.html") {
        parent::__construct($fullName, $email, $password, $role);
        $this->dashboardLink = $dashboardLink; // Default link to Supplier Dashboard
    }

    // Getter for the dashboard link
    public function getDashboardLink() {
        return $this->dashboardLink;
    }

    // You can add more supplier-specific methods here
    public function displayDashboardLink() {
        echo "<a href='" . $this->dashboardLink . "'>Go to Supplier Dashboard</a>";
    }
}
?>
