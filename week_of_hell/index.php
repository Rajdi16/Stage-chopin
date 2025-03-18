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
        <?php if (isset($_SESSION["status"])): ?>
            <?php if (isset($_SESSION["status"])): ?>
                    <?php if($_SESSION["status"]==="entreprise"||$_SESSION["status"]==="etudiant"|| $_SESSION["status"]==="professeur"):?>
                        <a href="page_compte.php">Compte</a>
                    <?php endif ?>
                <?php endif ?>
                    <a href="deconnexion.php">Deconnexion</a>
                <?php else: ?>
                    <a href="page_connection.php">Connectez-vous</a>
                <?php endif ?> 
                <?php if (isset($_SESSION["status"])): ?>
                    <?php if($_SESSION["status"]==="entreprise"||$_SESSION["status"]==="etudiant"):?>
                        <a href="creeOffreStage.php">Offre Stages</a>
                    <?php endif ?>
                    <?php if ($_SESSION["status"]==="etudiant"||$_SESSION["status"]==="etudiant" ):?> 
                        <a href="creeDemandeStage.php">Demande Stages</a>
                    <?php endif ?>
                
            <div class = "OffredeStage">                     
                        <?php if($_SESSION["status"]==="etudiant"):?>
                            <h2>Offre de stage</h2> 
                        <?php endif ?>
            <?php endif ?>
            </div> 
            <div class = "DemandedeStage">
                <?php if (isset($_SESSION["status"])): ?>
                    <?php if($_SESSION["status"]==="entreprise"):?>
                            <h2>Demande de stage</h2>
                    <?php endif ?>
                <?php endif ?>
            </div>              
    </div>
            
        
    
        
</body>
<footer>

</footer>

</html>