<?php

require_once __DIR__ . '/../models/User.php';

class AdminController {
    public function __construct() {
        if (!isset($_SESSION['user_id']) || !User::isAdmin($_SESSION['user_id'])) {
            header('HTTP/1.0 403 Forbidden');
            die("Toegang geweigerd. Alleen admins mogen deze pagina bekijken.");
        }
    }

    private function authorizeAdminRequest() {
        if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("Ongeautoriseerd verzoek.");
        }
        if (!User::isAdmin($_SESSION['user_id'])) {
            die("Toegang geweigerd. Alleen admins mogen deze actie uitvoeren.");
        }
    }

    public function dashboard() {
        // Load the admin dashboard view
        require __DIR__ . '/../views/admin_dashboard.php';
    }

    public function manageUsers() {
        $users = User::getAllUsers();
        require __DIR__ . '/../views/admin_manage_users.php';
    }

    public function manageBooks() {
        $books = Book::getAllBooks();
        require __DIR__ . '/../views/admin_manage_books.php';
    }

    public function deleteUser($id) {
        $this->authorizeAdminRequest();
        User::deleteUserById($id);
        header('Location: /webdev/MVC1/public/index.php?url=admin&action=manageUsers');
        exit();
    }

    public function deleteBook($id) {
        $this->authorizeAdminRequest();
        Book::deleteById($id);
        header('Location: /webdev/MVC1/public/index.php?url=admin&action=manageBooks');
        exit();
    }

    public function makeAdmin($id) {
        $this->authorizeAdminRequest();
        User::makeAdminById($id);
        header('Location: /webdev/MVC1/public/index.php?url=admin&action=manageUsers');
        exit();
    }

    public function revokeAdmin($id) {
        $this->authorizeAdminRequest();
        User::revokeAdminById($id);
        header('Location: /webdev/MVC1/public/index.php?url=admin&action=manageUsers');
        exit();
    }
}
