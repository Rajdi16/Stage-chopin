<?php
    session_start();
    
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
        <?php if (isset($_SESSION["status"])): ?>
            <?php if($_SESSION["status"]==="entreprise"||$_SESSION["status"]==="etudiant"|| $_SESSION["status"]==="professeur"):?>
                <a href="page_compte.php">Compte</a>
            <?php endif ?>
        <?php endif ?>
        <?php if (isset($_SESSION["status"])): ?>
            <?php if($_SESSION["status"]==="entreprise"):?>
                <a href="creeOffreStage.php">Offre Stages</a>
            <?php endif ?>
            <?php if ($_SESSION["status"]==="etudiant"):?> 
                <a href="creeDemandeStage.php">Demande Stages</a>
            <?php endif ?>
        <?php endif ?>

    </div>
        <?php if(isset($_SESSION["status"])):?>
        <?php if($_SESSION["status"]==="etudiant"):?>
    <div class = "OffredeStage">
        <h2>Offre de stage</h2>
    </div>
        <?php endif ?>
        <?php if($_SESSION["status"]==="entreprise"):?>
        <div class = "DemandedeStage">
            <h2>Demande de stage</h2>
        </div>
    <?php endif ?>
    <?php endif ?>
</body>
<footer>

</footer>

</html>