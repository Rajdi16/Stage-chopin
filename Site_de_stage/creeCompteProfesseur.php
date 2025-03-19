<?php
session_start();

include('./config.php');
if (isset($_POST['cree'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['motDePasse'])) {
        $stmt = $conn->prepare("INSERT INTO compteprofesseur (nom, prenom, email, motDePasse) VALUES (:nom,  :prenom, :email, :motDePasse)");
        $stmt->bindParam(':nom', $_POST['nom']);
        $stmt->bindParam(':prenom', $_POST['prenom']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':motDePasse', $_POST['motDePasse']);
        $stmt->execute();
        echo "element ajouter";
        header("Location: page_connection.php");
    } else {
        echo "remplissez tout les champs";
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="container">
    <div>
        <h1>Crée compte</h1>
        <form action="creeCompteProfesseur.php" method="post">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required>

            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" id="prenom" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="motDePasse">Mot de passe</label>
            <input type="password" name="motDePasse" id="motDePasse" required>

            <label for="motDePasse2">Confirmer mot de passe</label>
            <input type="password" name="motDePasse2" id="motDePasse2" required>

            <input type="submit" name="cree">
        </form>
    </div>
</body>

</html>