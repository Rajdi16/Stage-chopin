<?php
session_start();

include('./config.php');
if (isset($_POST['cree'])) {
    if (!empty($_POST['dateDeb']) && !empty($_POST['dateFin']) && !empty($_POST['description']) && !empty($_POST['etat']) && !empty($_POST['entreprise_Id'])) {
        $stmt = $conn->prepare("INSERT INTO demandestage (`dateDeb`, `dateFin`, `description`, `etat`, `entreprise_Id`) VALUES (:dateDeb, :dateFin, :description, :etat, :entreprise_Id)");
        $stmt->bindParam(':dateDeb', $_POST['dateDeb']);
        $stmt->bindParam(':dateFin', $_POST['dateFin']);
        if ($_POST['dateDeb'] > $_POST['dateFin']) {
            echo "la date de debut doit etre inferieur a la date de fin";
            return;
        } else {
            $stmt->bindParam(':description', $_POST['description']);
            $stmt->bindParam(':etat', $_POST['etat']);
            $stmt->bindParam(':entreprise_Id', $_POST[]);
            $stmt->execute();
        }
        header("Location: index.php");
    } else {
        echo "remplissez tout les champs";
    }

}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="container">
    <div>
        <h1>Fais une demande de stage</h1>
        <form action="creeDemandeStage.php" method="post">

            <label for="dateDeb">Date de debut</label>
            <input type="date" name="dateDeb" id="dateDeb" required>

            <label for="dateFin">Date de fin</label>
            <input type="date" name="dateFin" id="dateFin" required>

            <label for="description">Description</label>
            <input type="text" name="description" id="description" required>

            <label for="etat">Etat</label>
            <input type="text" name="etat" id="etat" required>

            <input type="submit" name="cree">
        </form>
    </div>
</body>

</html>