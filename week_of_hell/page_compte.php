<?php
    session_start();
    include('./config.php');
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
        <div class = "OffredeStage">  
            <?php if (isset($_SESSION["status"])): ?>              
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
    <div>
        <?php if($_SESSION["status"] === "etudiant"):?>
            <?php 
                $stmt = $conn->prepare("SELECT * FROM compteetudiant WHERE etudiant_Id = :id");
                $stmt->bindParam(':id', $_SESSION['id']);
                $stmt->execute();
                $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <h2>Comtpe :</h2>
                <p><?=$etudiants[0]['nom']?>, <?=$etudiants[0]['prenom']?>
                <p><?=$etudiants[0]['email']?>
                <p><?=$etudiants[0]['classe']?>

            <h2>Modifier le compte</h2>
                <form action="creeCompteEtudiant.php" method="post">
                    <label for="classe">Modifier votre classe</label>
                    <input type="text" name="classe" id="classe" value= '<?=$etudiants[0]['classe']?>' required>
                    <label for="email">Modifier votre email</label>
                    <input type="text" name="email" id="email" value= '<?=$etudiants[0]['email']?>' required>
                    <input type="submit" name="modifier" value="modifier">
                </form>

            <h2>demande de stage</h2>
        <?php endif ?>

        <?php if($_SESSION["status"] ==="entreprise"):?>
            <?php 
                $stmt = $conn->prepare("SELECT * FROM compteentreprise WHERE entreprise_Id = :id");
                $stmt->bindParam(':id', $_SESSION['id']);
                $stmt->execute();
                $entreprises = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <h2>Comtpe :</h2>
                <p><?=$entreprises[0]['nom']?>
                <p><?=$entreprises[0]['email']?>
                <p><?=$entreprises[0]['adresse']?>
                <p><?=$entreprises[0]['ville']?>, <?=$entreprises[0]['codePostal']?>
                <p><?=$entreprises[0]['site']?>

                <h2>Modifier le compte</h2>
                <form action="creeCompteEtudiant.php" method="post">
                    <label for="email">Modifier votre email</label>
                    <input type="text" name="email" id="email" value= '<?=$entreprises[0]['email']?>' required>
                    <label for="adresse">Modifier votre adresse</label>
                    <input type="text" name="adresse" id="adresse" value= '<?=$entreprises[0]['adresse']?>' required>
                    <label for="ville">Modifier votre ville</label>
                    <input type="text" name="ville" id="ville" value= '<?=$entreprises[0]['ville']?>' required>
                    <label for="codePostal">Modifier votre classe</label>
                    <input type="text" name="codePostal" id="codePostal" value= '<?=$entreprises[0]['codePostal']?>' required>
                    <label for="site">Modifier votre lien de site</label>
                    <input type="text" name="site" id="site" value= '<?=$entreprises[0]['site']?>' required>
                    <input type="submit" name="modifier" value="modifier">
                </form>

            <h2>Offre de stage</h2>
        <?php endif ?>
        <?php if($_SESSION["status"] ==="professeur"):?>
            <p>bienvenue professeur</p>
        <?php endif ?>
    </div>
</body>

</html>