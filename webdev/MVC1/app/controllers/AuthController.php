<?php

require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            $user = User::getUserByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: /webdev/MVC1/public/index.php');
                exit();
            } else {
                $error = "Ongeldige inloggegevens.";
            }
        }
        require __DIR__ . '/../views/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            if ($username && $email && $password) {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                User::createUser($username, $email, $hashedPassword);
                header('Location: /webdev/MVC1/public/index.php?url=auth&action=login');
                exit();
            } else {
                $error = "Alle velden zijn verplicht.";
            }
        }
        require __DIR__ . '/../views/register.php';
    }

    public function logout() {
        session_destroy();
        header('Location: /webdev/MVC1/public/index.php');
        exit();
    }
}
?>
