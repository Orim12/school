<?php include_once __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <h1>Admin Dashboard</h1>
    <p>Welkom bij het admin-dashboard. Kies een van de onderstaande opties om te beheren:</p>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="/webdev/MVC1/public/index.php?url=admin&action=manageUsers" class="btn btn-link">Gebruikers Beheren</a>
        </li>
        <li class="list-group-item">
            <a href="/webdev/MVC1/public/index.php?url=admin&action=manageBooks" class="btn btn-link">Boeken Beheren</a>
        </li>
    </ul>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
