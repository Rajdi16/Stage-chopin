<?php
session_start();

$stmt = $pdo->prepare("SELECT * FROM utilisateurs");

$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="barre">
        <a href="index.php">Accueil</a>
        <?php if (isset($_SESSION["status"])): ?>
            <?php if ($_SESSION["status"] === "entreprise" || $_SESSION["status"] === "etudiant" || $_SESSION["status"] === "professeur"): ?>
                <a href="page_compte.php">Compte</a>
            <?php endif ?>
        <?php endif ?>
        <?php if (isset($_SESSION["status"])): ?>
            <?php if ($_SESSION["status"] === "entreprise" || $_SESSION["status"] === "professeur"): ?>
                <a href="creeOffreStage.php">Offre Stages</a>
            <?php endif ?>
            <?php if ($_SESSION["status"] === "etudiant" || $_SESSION["status"] === "professeur"): ?>
                <a href="creeDemandeStage.php">Demande Stages</a>
            <?php endif ?>
        <?php endif ?>
        <?php if (isset($_SESSION["status"])): ?>
            <a href="deconnexion.php">Deconnexion</a>
        <?php else: ?>
            <a href="page_connection.php">Connectez-vous</a>
        <?php endif ?>
    </div>
    <?php if (isset($_SESSION["id"])) {
        echo $_SESSION["id"];
    }?>
    <div class="offreDeStage">
        <?php if (isset($_SESSION["status"])): ?>
            <?php if ($_SESSION["status"] === "etudiant"||$_SESSION["status"] ==="professeur" ): ?>
                <h2>Offre de stage</h2>
            <?php endif ?>
        <?php endif ?>

    </div>
    <div class="DemandedeStage">
        <?php if (isset($_SESSION["status"])): ?>
            <?php if ($_SESSION["status"] === "entreprise"||$_SESSION["status"] ==="professeur" ): ?>
                <h2>Demande de stage</h2>
            <?php endif ?>
        <?php endif ?>
    </div>
</body>
<footer>

</footer>

</html>