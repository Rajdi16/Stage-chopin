<?php
include('./config.php');
if (isset($_POST['cree'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['classe']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        if ($_POST['password'] == $_POST['password2']) {
            $stmt = $conn->prepare("INSERT INTO `compteetudiant`(`nom`, `prenom`, `classe`, `email`, `motDePasse`) VALUES (:nom, :prenom, :classe, :email, :motDePasse)");
            $stmt->bindParam(':nom', $_POST['nom']);
            $stmt->bindParam(':prenom', $_POST['prenom']);
            $stmt->bindParam(':classe', $_POST['classe']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':motDePasse', $_POST['password']);
            $stmt->execute();
            header("Location: page_connection.php");
            return;
        } else {
            echo "Les mots de passe ne correspondent pas";
        }
    } else {
        echo "Veuillez remplir tous les champs et vérifier que les mots de passe correspondent";
    }

}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte étudiant</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="container">
    <div>
        <h1>Créer un compte</h1>
        <form action="creeCompteEtudiant.php" method="post" enctype="multipart/form-data">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required>

            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" required>

            <label for="classe">Votre classe</label>
            <input type="text" name="classe" id="classe" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>

            <label for="password2">Confirmer mot de passe</label>
            <input type="password" name="password2" id="password2" required>

            <input type="submit" name="cree" value="Créer">
        </form>
    </div>
</body>

</html>