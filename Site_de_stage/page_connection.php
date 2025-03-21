<?php
session_start();
?>
<?php
include('./config.php');
if (isset($_POST['Connexion'])) {
    if (!empty($_POST['email']) && !empty($_POST['motdepasse']) && !empty($_POST['typeCompte'])) {
        switch ($_POST['typeCompte']) {
            case "etudiant":
                $stmt = $conn->query("SELECT * FROM compteetudiant");
                $stmt->execute();
                $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($etudiants as $etudiant) {
                    if ($etudiant['email'] === $_POST['email'] && $etudiant['motDePasse'] === $_POST['motdepasse']) {
                        $_SESSION["status"] = "etudiant";
                        $_SESSION["id"] = $etudiant['etudiant_Id'];
                        header("location: index.php");
                    }
                }
                break;

            case "entreprise":
                $stmt = $conn->query("SELECT * FROM compteentreprise");
                $stmt->execute();
                $entreprises = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($entreprises as $entreprise) {
                    if ($entreprise['email'] === $_POST['email'] && $entreprise['motDePasse'] === $_POST['motdepasse']) {
                        $_SESSION["status"] = "entreprise";
                        $_SESSION["id"] = $entreprise['entreprise_Id'];
                        header("location: index.php");

                    }
                }
                break;

            case "professeur":
                $stmt = $conn->query("SELECT * FROM compteprofesseur");
                $stmt->execute();
                $professeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($professeurs as $professeur) {
                    if ($professeur['email'] === $_POST['email'] && $professeur['motDePasse'] === $_POST['motdepasse']) {
                        $_SESSION["status"] = "professeur";
                        $_SESSION["id"] = $professeur['prof_Id'];
                        header("location: index.php");
                    }
                }
                break;
        }
    } else {
        echo "veulliez remplir tout les champs";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="container">
    <div>
        <h1>Connexion</h1>
        <form method="post">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="motdepasse" placeholder="Mot de passe" required>

            <select name="typeCompte" id="typeCompte">
                <option value="none">--Choisir un status--</option>
                <option value="etudiant">Etudiant</option>
                <option value="entreprise">Entreprise</option>
                <option value="professeur">Professeur</option>
            </select>
            <input type="submit" name="Connexion">

        </form>
        <div>
            <a href="status.php"> <input type="button" value="creer un compte"></a>
        </div>
    </div>
    <?php
    if (isset($_session['id'])) {
        echo "veulliez remplir tout les champs";
    }
    ?>
</body>


</html>