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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <img src="image/logo.png" class="logo">
            <ul>
                <li> <a href="index.php">
                        <p>Accueil</p>
                    </a>
                </li>
                <li>
                    <?php if (isset($_SESSION["status"])): ?>
                        <?php if ($_SESSION["status"] === "entreprise" || $_SESSION["status"] === "etudiant" || $_SESSION["status"] === "professeur"): ?>
                            <a href="page_compte.php">
                                <p>Compte</p>
                            </a>
                        <?php endif ?>
                    <?php endif ?>
                </li>
                <li>
                    <?php if (isset($_SESSION["status"])): ?>
                        <?php if ($_SESSION["status"] === "entreprise" || $_SESSION["status"] === "professeur"): ?>
                            <a href="creeOffreStage.php">
                                <p>Offre Stages</p>
                            </a>
                        <?php endif ?>
                        <?php if ($_SESSION["status"] === "etudiant" || $_SESSION["status"] === "professeur"): ?>
                            <a href="creeDemandeStage.php">
                                <p>Demande Stages</p>
                            </a>
                        <?php endif ?>
                    <?php endif ?>
                </li>
                <li>
                    <?php if (isset($_SESSION["status"])): ?>
                        <?php if ($_SESSION["status"] === "professeur"): ?>
                            <a href="stage.php">
                                <p>Stages</p>
                            </a>
                        <?php endif ?>

                    <?php endif ?>
                </li>
                <li>
                    <?php if (isset($_SESSION["status"])): ?>
                        <a href="deconnexion.php">
                            <p>Deconnexion</p>
                        </a>
                    <?php else: ?>
                        <a href="page_connection.php">
                            <p>Connectez-vous</p>
                        </a>
                    <?php endif ?>
                </li>
            </ul>
        </div>
        <div class="content">
            <h1>STAGE POUR TOUS</h1>
            <p>Le site qui vous permet de trouver un stage ou un stagiaire</p>
            <p>Vous êtes une entreprise ou un/e étudiant/e, vous êtes au bon endroit</p>
        </div>
    </div>
    <div>
        <div>
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
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                <?php endif ?>
            </div>
            <div class="demandeDeStage">
                <?php if (isset($_SESSION["status"])): ?>
                    <?php if ($_SESSION["status"] === "entreprise" || $_SESSION["status"] === "professeur"): ?>
                        <h2>Demande de stage</h2>
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
        </div>
    </div>
</body>
<footer>
    <div class="footer">
        <p>Copyright © 2023</p>
    </div>
</footer>

</html>