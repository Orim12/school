<?php include_once __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <h1>Nieuw Boek</h1>
    <form action="/webdev/MVC1/public/index.php?url=books&action=store" method="post">
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
        <?php
        function generateRandomId($length = 10) {
            return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', $length)), 0, $length);
        }

        function isIdAvailable($id, $pdo) {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM books WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetchColumn() == 0;
        }

        // Assuming you have a PDO connection $pdo
        $pdo = new PDO('mysql:host=localhost;dbname=Bookbistro', 'root', '');

        do {
            $randomId = generateRandomId();
        } while (!isIdAvailable($randomId, $pdo));
        ?>
        <div style="display: none;">
            <label for="id" class="form-label">id:</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $randomId; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
