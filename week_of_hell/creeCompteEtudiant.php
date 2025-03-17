<?php
include('./config.php');
if (isset($_POST['cree'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2']) && $_POST['password'] === $_POST['password2']) {
        $stmt = $conn->prepare("INSERT INTO `compteetudiant`(`nom`, `prenom`, `email`, `motDePasse`, `cv`) VALUES (:nom, :prenom, :email, :motDePasse, :cv)");
        $stmt->bindParam(':nom', $_POST['nom']);
        $stmt->bindParam(':prenom', $_POST['prenom']);
        $stmt->bindParam(':email', $_POST['email']);
        $cv = file_get_contents($_FILES['file']['tmp_name']);
        $stmt->bindParam(':cv', $cv, PDO::PARAM_LOB);
        $stmt->bindParam(':motDePasse', $_POST['password']);

        if ($stmt->execute()) {
            echo "Élément ajouté avec succès";
            header("Location: index.php");
        } else {
            echo "Erreur lors de l'ajout de l'élément";
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

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>

            <label for="password2">Confirmer mot de passe</label>
            <input type="password" name="password2" id="password2" required>

            <label for="file">Votre CV</label>
            <input type="file" name="file" id="file">

            <input type="submit" name="cree" value="Créer">
        </form>
    </div>
</body>

</html>