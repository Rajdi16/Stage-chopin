<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="barre">
        <a href="index.php">Accueil</a>
        <a href="page_connection.php">Connectez-vous</a>
        <a href="creeOffreStage.php">Offre Stages</a>
        <a href="page_stages.php">Demande Stages</a>
    </div>
    <div>
        <?php if($_SESSION["status"] ==="etudiant"):?>
            <h2>demande de stage</h2>
            
        <?php endif ?>
        <?php if($_SESSION["status"] ==="entreprise"):?>
            <h2>Offre de stage</h2>
        <?php endif ?>
        <?php if($_SESSION["status"] ==="professeur"):?>
            <p>bienvenue professeur</p>
        <?php endif ?>
    </div>
</body>

</html>