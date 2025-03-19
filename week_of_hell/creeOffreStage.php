<?php
session_start();

include('./config.php');
if (!isset($_SESSION['id'])) {
    echo "Vous devez être connecté pour faire une offre de stage.";
    exit();
}

if (isset($_POST['cree'])) {
    if (!empty($_POST['dateDeb']) && !empty($_POST['dateFin']) && !empty($_POST['description']) && !empty($_POST['etat'])) {
        if ($_POST['dateDeb'] > $_POST['dateFin']) {
            echo "La date de début doit être inférieure à la date de fin";
            return;
        }

        $stmt = $conn->prepare("INSERT INTO demandestage (`dateDeb`, `dateFin`, `description`, `etat`, `enterpris_Id`) VALUES (:dateDeb, :dateFin, :description, :etat, :enterpris_Id)");
        $stmt->bindParam(':dateDeb', $_POST['dateDeb']);
        $stmt->bindParam(':dateFin', $_POST['dateFin']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':etat', $_POST['etat']);
        $stmt->bindParam(':enterpris_Id', $_SESSION['id']);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Erreur lors de la création de la demande de stage";
        }
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faire une demande de stage</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="container">
    <div>
        <h1>Faire une demande de stage</h1>
        <form action="creeDemandeStage.php" method="post">
            <label for="dateDeb">Date de début</label>
            <input type="date" name="dateDeb" id="dateDeb" required>

            <label for="dateFin">Date de fin</label>
            <input type="date" name="dateFin" id="dateFin" required>

            <label for="description">Description</label>
            <input type="text" name="description" id="description" required>

            <select name="etat" id="etat">
                <option value="En Cours">En Cours</option>
                <option value="Terminer">Terminer</option>
            </select required>

            <input type="submit" name="cree" value="Créer">
        </form>
    </div>
</body>

</html>