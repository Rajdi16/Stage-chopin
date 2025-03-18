<?php
include('./config.php');
if (isset($_POST['crée'])) {
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['codePostal']) && !empty($_POST['motDePasse'])) {
        if ($_POST['motDePasse'] == $_POST['motDePasse2']) {
            $stmt = $conn->prepare("INSERT INTO `compteEntreprise` (`nom`, `email`, `adresse`, `ville`, `codePostal`, `motDePasse`) VALUES (:nom, :email, :adresse, :ville, :codePostal, :motDePasse)");
            $stmt->bindParam(':nom', $_POST['nom']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':adresse', $_POST['adresse']);
            $stmt->bindParam(':ville', $_POST['ville']);
            $stmt->bindParam(':codePostal', $_POST['codePostal']);
            $hashedPassword = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);
            $stmt->bindParam(':motDePasse', $hashedPassword);
            $stmt->execute();
            echo "Compte créé avec succès";
            header("Location: index.php");
            return;
        } else {
            echo "Les mots de passe ne correspondent pas";
        }
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Créer un compte entreprise</title>
</head>

<body class="container">
    <form method="post">
        <div>
            <label for="nom">Nom de l'entreprise</label>
            <input type="text" name="nom"><br>

            <label for="email">Email</label>
            <input type="email" name="email"><br>

            <label for="adresse">Adresse</label>
            <input type="text" name="adresse"><br>

            <label for="ville">Ville</label>
            <input type="text" name="ville"><br>

            <label for="codePostal">Code Postal</label>
            <input type="number" name="codePostal"><br>

            <label for="motDePasse">Mot de passe</label>
            <input type="password" name="motDePasse"><br>

            <label for="motDePasse2">Confirmer mot de passe</label>
            <input type="password" name="motDePasse2"><br>

        </div>
        <input type="submit" name="crée">
    </form>
</body>

</html>