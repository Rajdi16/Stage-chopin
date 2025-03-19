<?php
include('./config.php');
session_start();

$stmt = $conn->prepare("SELECT * FROM offrestage");

$stmt->execute();

$offres = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT * FROM demandestage");

$stmt->execute();

$demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
            <a href="deconnexion.php">Deconnexion</a>
        <?php else: ?>
            <a href="page_connection.php">Connectez-vous</a>
        <?php endif ?>
    </div>
    <?php if (isset($_SESSION["id"])) {
        echo $_SESSION["id"];
    } ?>
    <div class="offreDeStage">
        <?php if (isset($_SESSION["status"])): ?>
            <?php if ($_SESSION["status"] === "etudiant" || $_SESSION["status"] === "professeur"): ?>
                <h2>Offre de stage</h2>
                <div class="grilleOffre">
                    <?php foreach ($offres as $offre): ?>
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM compteentreprise WHERE entreprise_Id = :entreprise_Id");
                        $stmt->bindParam(':entreprise_Id', $offre['entreprise_Id']);
                        $stmt->execute();
                        $entreprises = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="grille">
                            <?= $entreprises[0]['nom'] ?>
                            <p>Date de début</p>
                            <?= $offre['dateDeb'] ?>
                            <p>Date de fin</p>
                            <?= $offre['dateFin'] ?>
                            <p>Description</p>
                            <?= $offre['description'] ?>
                            <div>
                                <input type="submit" value="Choisir">
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        <?php endif ?>

    </div>
    <div class="DemandedeStage">
        <?php if (isset($_SESSION["status"])): ?>
            <?php if ($_SESSION["status"] === "entreprise" || $_SESSION["status"] === "professeur"): ?>
                <h2>Demande de stage</h2>
                <div class="barreDeRecherche">
                    <form action="stage.php" method="post">
                        <input type="text" name="recherche" placeholder="Recherche etudiant">
                        <input type="submit" value="Rechercher">
                    </form>
                </div>
                <div class="grilleOffre">
                    <?php foreach ($demandes as $demande): ?>
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM compteetudiant WHERE etudiant_Id = :etudiant_Id");
                        $stmt->bindParam(':etudiant_Id', $demande['etudiant_Id']);
                        $stmt->execute();
                        $etudiant = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="grille">
                            <?= $etudiant[0]['nom'] ?>
                            <p>Date de début</p>
                            <?= $demande['dateDeb'] ?>
                            <p>Date de fin</p>
                            <?= $demande['dateFin'] ?>
                            <p>Description</p>
                            <?= $demande['description'] ?>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        <?php endif ?>
    </div>
</body>
<footer>

</footer>

</html>