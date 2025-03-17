<?php
include('./config.php');
if (isset($_POST['cree'])) {
    if (!empty($_POST['dateDeb']) && !empty($_POST['dateFin']) && !empty($_POST['description']) && !empty($_POST['etat']) && !empty($_POST['entreprise_Id'])) {
        $stmt = $conn->prepare("INSERT INTO offrestage (`dateDeb`, `dateFin`, `description`, `etat`, `entreprise_Id`) VALUES (:dateDeb, :dateFin, :description, :etat, :entreprise_Id)");
        $stmt->bindParam(':dateDeb', $_POST['dateDeb']);
        $stmt->bindParam(':dateFin', $_POST['dateFin']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':etat', $_POST['etat']);
        $stmt->bindParam(':entreprise_Id', $_POST['entreprise_Id']);
        $stmt->execute();
        echo "element ajouter";
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
        <h1>Offere un stage</h1>
        <form action="creeUnStage.php" method="post">
            <label for="dateDeb">Date de debut</label>
            <input type="date" name="dateDeb" id="dateDeb" required>

            <label for="dateFin">Date de fin</label>
            <input type="date" name="dateFin" id="dateFin" required>

            <label for="description">Description</label>
            <input type="text" name="description" id="description" required>

            <label for="etat">Etat</label>
            <input type="text" name="etat" id="etat" required>

            <label for="entreprise_Id">Entreprise Id</label>
            <input type="text" name="entreprise_Id" id="entreprise_Id" required>


            <input type="submit" name="cree">
        </form>
    </div>
</body>

</html>