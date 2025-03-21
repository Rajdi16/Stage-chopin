<?php
include('./config.php');
session_start();
if(isset($_POST['cree'])){
    $stmt = $conn->prepare("INSERT INTO `stage`(`etudiant_Id`, `entreprise_Id`, `prof_Id`) VALUES (:etudiant_Id, :entreprise_Id, :prof_Id)");
    $stmt->bindParam(':etudiant_Id', $_POST['etudiantid']);
    $stmt->bindParam(':entreprise_Id', $_POST['entrepriseid']);
    $stmt->bindParam(':prof_Id', $_SESSION['id']);
    $stmt->execute();
    header("location: index.php");
}

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
        <div class="compte">
            <?php if (isset($_SESSION["status"])): ?>
                <?php if ($_SESSION["status"] === "etudiant" || $_SESSION["status"] === "professeur"): ?>
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM compteentreprise ");
                            $stmt->execute();
                            $entreprises = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $stmt1 = $conn->prepare("SELECT * FROM compteetudiant ");
                            $stmt1->execute();
                            $etudiants = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <div class="contentcompte">
                            <div class="compteaffiche">
                                <h2>Crée stage :</h2>
                                <div class="div-formulaire">
                                <form method="post" enctype="multipart/form-data">
                                    <label for="entreprise">Entreprise :</label>
                                    <select name="entrepriseid" id="entreprise">
                                        <?php foreach ($entreprises as $entreprise): ?>
                                            <option value="<?=$entreprise['entreprise_Id']?>"><?=$entreprise['nom']?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <label for="etudiant">Etudiant :</label>
                                    <select name="etudiantid" id="etudiant">
                                        <?php foreach ($etudiants as $etudiant): ?>
                                            <option value="<?=$etudiant['etudiant_Id']?>"><?=$etudiant['nom']?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <input type="submit" name="cree" value="Créer">
                                </div>
                            </div>
                <?php endif ?>
            <?php endif ?>

        </div>
</body>
<footer>

</footer>

</html>