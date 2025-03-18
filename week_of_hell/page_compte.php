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
        <a href="page_connection.php">Connectez-vous</a>
        <a href="creeOffreStage.php">Offre Stages</a>
        <a href="page_stages.php">Demande Stages</a>
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
                <p><?=$etudiants[0]['nom']?>
                <p><?=$etudiants[0]['prenom']?>
                <p><?=$etudiants[0]['email']?>
                <p><?=$etudiants[0]['classe']?>

            <h2>Modifier le compte</h2>
                <form action="creeCompteEtudiant.php" method="post" enctype="multipart/form-data">
                    <label for="classe">Modifier votre classe</label>
                    <input type="text" name="classe" id="classe" value= <?=$etudiants[0]['classe']?> required>
                    <input type="submit" name="modifier" value="modifier">
                </form>

            <h2>demande de stage</h2>
        <?php endif ?>

        <?php if($_SESSION["status"] ==="entreprise"):?>
            <?php 
                $stmt = $conn->query("SELECT * FROM compteentreprise WHERE id = :id");
                $stmt->bindParam(':id', $_SESSION['id']);
                $stmt->execute();
                $entreprises = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <h2>Comtpe :</h2>
                <p><?=$entreprises['nom']?>
                <p><?=$entreprises['mail']?>

            <h2>Offre de stage</h2>
        <?php endif ?>
        <?php if($_SESSION["status"] ==="professeur"):?>
            <p>bienvenue professeur</p>
        <?php endif ?>
    </div>
</body>

</html>