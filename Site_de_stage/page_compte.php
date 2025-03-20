<?php
session_start();
include('./config.php');
$stmt = $conn->prepare("SELECT * FROM offrestage");

$stmt->execute();

$offres = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT * FROM demandestage");

$stmt->execute();

$demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="pagecompte">
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
            <?php if ($_SESSION["status"] === "etudiant"): ?>
                <?php
                $stmt = $conn->prepare("SELECT * FROM compteetudiant WHERE etudiant_Id = :id");
                $stmt->bindParam(':id', $_SESSION['id']);
                $stmt->execute();
                $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div class="contentcompte">
                    <div class="compteaffiche">
                        <h2>Comtpe :</h2>
                        <p><?= $etudiants[0]['nom'] ?>, <?= $etudiants[0]['prenom'] ?>
                        <p><?= $etudiants[0]['email'] ?>
                        <p><?= $etudiants[0]['classe'] ?>
                    </div>
                <div>
                <h2>Modifier le compte</h2>
                    <form method="post" action="modifierCompteEtudiant.php">
                        <label for="classe">Modifier votre classe</label>
                        <input type="text" name="classe" id="classe" value='<?= $etudiants[0]['classe'] ?>' required>
                        <label for="email">Modifier votre email</label>
                        <input type="text" name="email" id="email" value='<?= $etudiants[0]['email'] ?>' required>
                        <input type="submit" name="modifier" value="modifier">
                    </form>
                </div>
            </div>
            <?php endif ?>
            <?php if ($_SESSION["status"] === "entreprise"): ?>
                <?php
                $stmt = $conn->prepare("SELECT * FROM compteentreprise WHERE entreprise_Id = :id");
                $stmt->bindParam(':id', $_SESSION['id']);
                $stmt->execute();
                $entreprises = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div class="contentcompte">
                    <div class="compteaffiche">
                        <h2>Comtpe :</h2>
                        <p><?= $entreprises[0]['nom'] ?>
                        <p><?= $entreprises[0]['email'] ?>
                        <p><?= $entreprises[0]['adresse'] ?>
                        <p><?= $entreprises[0]['ville'] ?>, <?= $entreprises[0]['codePostal'] ?>
                        <p><?= $entreprises[0]['site'] ?>
                    </div>
                <div class="div-formulaire">
                <h2>Modifier le compte</h2>
                    <form method="post" action="modifierCompteEntreprise.php">
                        <label for="email">Modifier votre email</label>
                        <input type="text" name="email" id="email" value='<?= $entreprises[0]['email'] ?>' required>
                        <label for="adresse">Modifier votre adresse</label>
                        <input type="text" name="adresse" id="adresse" value='<?= $entreprises[0]['adresse'] ?>' required>
                        <label for="ville">Modifier votre ville</label>
                        <input type="text" name="ville" id="ville" value='<?= $entreprises[0]['ville'] ?>' required>
                        <label for="codePostal">Modifier votre code postal</label>
                        <input type="text" name="codePostal" id="codePostal" value='<?= $entreprises[0]['codePostal'] ?>'
                            required>
                        <label for="site">Modifier votre lien de site</label>
                        <input type="text" name="site" id="site" value='<?= $entreprises[0]['site'] ?>' required>
                        <input type="submit" name="modifier" value="modifier">
                    </form>
                </div>
            </div>
            <?php endif ?>
            <?php if ($_SESSION["status"] === "professeur"): ?>
                <?php
                $stmt = $conn->prepare("SELECT * FROM compteprofesseur WHERE prof_Id = :id");
                $stmt->bindParam(':id', $_SESSION['id']);
                $stmt->execute();
                $professeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div class="contentcompte">
                    <div class="compteaffiche">
                        <h2>Comtpe :</h2>
                        <p><?= $professeurs[0]['nom'] ?>, <?= $professeurs[0]['prenom'] ?>
                        <p><?= $professeurs[0]['email'] ?>
                    </div>
                <div class="div-formulaire">
                <h2>Modifier le compte</h2>
                <form method="post" action="modifierCompteProf.php">
                    <label for="email">Modifier votre email</label>
                    <input type="text" name="email" id="email" value='<?= $professeurs[0]['email'] ?>' required>
                    <input type="submit" name="modifier" value="modifier">
                </form>
                </div>
            </div>
            <?php endif ?>
        </div>
    </div>
    <?php if ($_SESSION["status"] === "etudiant"): ?>
        <div class="demandeDeStage">
                        <h2>Mes demande de stage</h2>
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
                                    <?= $demande['description'] ?><br>
                                    <a href="supprimerdemande.php?id=<?=$demande['demandeStage_Id']?>">supprimer</a>
                                </div>
                            <?php endforeach ?>
                        </div>
            </div>
    <?php endif ?>

    <?php if ($_SESSION["status"] === "entreprise"): ?>
        <div class="offreDeStage">
                        <h2>Mes offres de stage</h2>
                        <div class="grilleOffre">
                            <?php foreach ($offres as $offre): ?>
                                <?php
                                $stmt = $conn->prepare("SELECT * FROM compteentreprise WHERE entreprise_Id = :entreprise_Id");
                                $stmt->bindParam(':entreprise_Id', $_SESSION['id']);
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
                                    <?= $offre['description'] ?><br>
                                    <a href="supprimeroffre.php?id=<?=$offre['offreStage_Id']?>">supprimer</a>
                                </div>
                            <?php endforeach ?>
                        </div>
            </div>
    <?php endif ?>
</body>

</html>