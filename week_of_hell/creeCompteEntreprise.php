<?php
include('./config.php');
if (isset($_POST['crée'])) {
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['codePostal']) && !empty($_POST['motDePasse'])) {
        $stmt = $conn->prepare("INSERT INTO compteEntreprise (nom, email, adresse, ville, codePostal, motDePasse) VALUES (:nom, :email, :adresse, :ville, :codePostal, :motDePasse)");
        $stmt->bindParam(':nom', $_POST['nom']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':adresse', $_POST['adresse']);
        $stmt->bindParam(':ville', $_POST['ville']);
        $stmt->bindParam(':codePostal', $_POST['codePostal']);
        $stmt->bindParam(':motDePasse', $_POST['motDePasse']);
        $stmt->execute();
        echo "element ajouter";
        header("Location: index.php");
    } else {
        echo "remplissez tout les champs";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>crée un compte entreprise</title>
</head>

<body>
    <form method="post">
        <div>
            <label for="nom">nom de l'entreprise</label>
            <input type="text" name="nom"><br>

            <label for="email">email</label>
            <input type="email" name="email"><br>

            <label for="adresse">adresse</label>
            <input type="text" name="adresse"><br>

            <label for="ville">ville</label>
            <input type="text" name="ville"><br>

            <label for="codePostal">code Postal</label>
            <input type="number" name="codePostal"><br>

            <label for="motDePasse">mot de passe</label>
            <input type="text" name="motDePasse"><br>

        </div>
        <input type="submit" name="crée">
    </form>
</body>

</html>