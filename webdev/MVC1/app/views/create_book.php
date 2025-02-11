<!DOCTYPE html>
<html>
<head>
    <title>Nieuw Boek</title>
</head>
<body>
    <h1>Nieuw Boek</h1>
    <form action="/webdev/MVC1/public/index.php?url=books&action=store" method="post">
        <label for="titel">Titel:</label>
        <input type="text" id="titel" name="titel" required><br>
        <label for="auteur">Auteur:</label>
        <input type="text" id="auteur" name="auteur" required><br>
        <label for="prijs">Prijs:</label>
        <input type="text" id="prijs" name="prijs" required><br>
        <button type="submit">Opslaan</button>
    </form>
</body>
</html>
