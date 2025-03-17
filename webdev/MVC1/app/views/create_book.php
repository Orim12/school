<?php include_once __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <h1>Nieuw Boek</h1>
    <form action="/webdev/MVC1/public/index.php?url=books&action=store" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <div class="mb-3">
            <label for="titel" class="form-label">Titel:</label>
            <input type="text" class="form-control" id="titel" name="titel" required>
        </div>
        <div class="mb-3">
            <label for="auteur" class="form-label">Auteur:</label>
            <input type="text" class="form-control" id="auteur" name="auteur" required>
        </div>
        <div class="mb-3">
            <label for="prijs" class="form-label">Prijs:</label>
            <input type="text" class="form-control" id="prijs" name="prijs" required>
        </div>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
