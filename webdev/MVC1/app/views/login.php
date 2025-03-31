<?php include_once __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <h1>Inloggen</h1>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
    <?php endif; ?>
    <form action="/webdev/MVC1/public/index.php?url=auth&action=login" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Wachtwoord:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Inloggen</button>
    </form>
    <p class="mt-3">Nog geen account? <a href="/webdev/MVC1/public/index.php?url=auth&action=register">Registreer hier</a>.</p>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
