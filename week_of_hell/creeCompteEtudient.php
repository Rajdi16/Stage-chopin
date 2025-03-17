<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Crée compte</h1>
    <form action="creeCompteEtudient.php" method="post">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" required>

        <label for="prenom">Prenom</label>
        <input type="text" name="prenom" id="prenom" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>

        <label for="password2">Confirmer mot de passe</label>
        <input type="password" name="password2" id="password2" required>

        <label for="file">Votre CV</label>
        <input type="file" name="file" id="file">

        <input type="submit" value="Crée compte">
    </form>

</body>

</html>