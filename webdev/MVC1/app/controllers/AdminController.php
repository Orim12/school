<?php

class AdminController {
    public function dashboard() {
        // Load the admin dashboard view
        require __DIR__ . '/../views/admin_dashboard.php';
    }

    public function manageUsers() {
        // Load the manage users view
        require __DIR__ . '/../views/admin_manage_users.php';
    }

    public function manageBooks() {
        // Load the manage books view
        require __DIR__ . '/../views/admin_manage_books.php';
    }
}
