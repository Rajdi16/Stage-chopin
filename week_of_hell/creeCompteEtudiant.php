<?php
include('./config.php');
if (isset($_POST['crée'])) {
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['codePostal']) && !empty($_POST['motDePasse'])) {
        $stmt = $conn->prepare("INSERT INTO compteetudiant (nom, prenom, email, classe, cv, lettreMotivation, motDePasse) VALUES (:nom, :email, :classe, :cv, :lettreMotivation, :motDePasse)");
        $stmt->bindParam(':nom', $_POST['nom']);
        $stmt->bindParam(':prenom', $_POST['prenom']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':classe', $_POST['classe']);
        $stmt->bindParam(':cv', $_POST['cv']);
        $stmt->bindParam(':lettreMotivation', $_POST['lettreMotivation']);
        $stmt->bindParam(':motDePasse', $_POST['motDePasse']);
        $stmt->execute();
        echo "element ajouter";
        header("Location: index.php");
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

            <input type="submit" value="Crée">
        </form>
    </div>

</body>
<script>
    if (document.getElementById('password').value != document.getElementById('password2').value) {
        alert('les mots de passe ne sont pas identiques');
    }
</script>

</html>