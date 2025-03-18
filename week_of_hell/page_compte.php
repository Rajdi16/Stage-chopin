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
        <form action="recherche.php" method="get" class="search-form">
            <input type="text" name="query" placeholder="Rechercher un stage...">
            <button type="submit">Rechercher</button>
        </form>
    </div>
    <div>
        <?php if($_SESSION["status"] ==="etudiant"):?>
            <p>bienvenue etudiant</p>
        <?php if($_SESSION["status"] ==="entreprise"):?>
            <p>bienvenue entreprise</p>
        <?php if($_SESSION["status"] ==="professeur"):?>
            <p>bienvenue professeur</p>
    </div>
</body>

</html>