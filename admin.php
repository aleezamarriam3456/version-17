<?php
namespace Models;

class Admin extends User {
    private $adminLevel;

    public function __construct($fullName, $email, $password, $role, $adminLevel = 1) {
        // Inherit properties from the parent User class
        parent::__construct($fullName, $email, $password, $role);
        $this->adminLevel = $adminLevel;
    }

    public function getAdminLevel() {
        return $this->adminLevel;
    }

    // Example method to display admin dashboard info
    public function displayDashboard() {
        return "Welcome, {$this->fullName}. Your admin level is {$this->adminLevel}.";
    }

    // Other admin-specific methods can be added here
}
?>
