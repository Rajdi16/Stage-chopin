<?php
session_start("status");
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
        <a href="page_connection.php">Connectez-vous</a>
        <a href="page_compte.php">Compte</a>
        <?php if($_SESSION["status"]="etudiant"):?>
        <a href="creeOffreStage.php">Offre Stages</a>
        <?php endif ?>
        <?php if ($_SESSION["status"]="entrprise"):?> 
        <a href="creeDemandeStage.php">Demande Stages</a>
        <?php endif ?>

    </div>
    <div class = "OffredeStage">
        <h2>Offre de stage</h2>
    </div>
    <div class = "DemandedeStage">
        <h2>Demande de stage</h2>
    </div>
</body>
<footer>

</footer>

</html>