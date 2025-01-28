<?php
namespace Models;

class Customer extends User {
    private $adminLevel;

    public function __construct($fullName, $email, $password, $role, $adminLevel = 1) {
        parent::__construct($fullName, $email, $password, $role);
        $this->adminLevel = $adminLevel;
    }

    public function getAdminLevel() {
        return $this->adminLevel;
    }

    // You can add more admin-specific methods here
}
?>