<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookBistro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
require_once __DIR__ . '/../models/User.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BookBistro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/webdev/MVC1/public/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/webdev/MVC1/public/index.php?url=books&action=create">Boek Toevoegen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/webdev/MVC1/public/index.php?url=books">Boekenlijst</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <span class="navbar-text me-2">Welkom, <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></span>
                    </li>
                    <?php if (User::isAdmin($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="btn btn-outline-secondary btn-sm me-2" href="/webdev/MVC1/public/index.php?url=admin">Admin Dashboard</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-danger btn-sm" href="/webdev/MVC1/public/index.php?url=auth&action=logout">Uitloggen</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary btn-sm" href="/webdev/MVC1/public/index.php?url=auth&action=login">Inloggen</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>
