<?php
class User {
    public $id;
    public $username;
    public $email;

    private static function getConnection() {
        $host = 'localhost';
        $db = 'Bookbistro';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            return new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getAllUsers() {
        $pdo = self::getConnection();
        $stmt = $pdo->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }

    public static function deleteUserById($id) {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute([$id]);
    }

    public static function getUserByEmail($email) {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public static function createUser($username, $email, $password) {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$username, $email, $password]);
    }

    public static function isAdmin($userId) {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare('SELECT is_admin FROM users WHERE id = ?');
        $stmt->execute([$userId]);
        $row = $stmt->fetch();
        return $row && $row['is_admin'] == 1;
    }

    public static function makeAdminById($id) {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare('UPDATE users SET is_admin = 1 WHERE id = ?');
        $stmt->execute([$id]);
    }

    public static function revokeAdminById($id) {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare('UPDATE users SET is_admin = 0 WHERE id = ?');
        $stmt->execute([$id]);
    }
}
?>
