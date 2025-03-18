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
                        $_SESSION["id"] = $etudiant['id'];
                        header("location: index.php");
                    }
                }
                break;

                case "entreprise":
                    $stmt = $conn->query("SELECT * FROM compteentreprise");
                    $stmt->execute();
                    $entreprises = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($entreprises as $entreprise){
                        if($entreprise['email']===$_POST['email'] && $entreprise['motDePasse']===$_POST['motdepasse']){
                            $_SESSION["status"] = "entreprise";
                            $_SESSION["id"] = $etudiant['id'];
                            header("location: index.php");

                    }
                }
                break;

                case "professeur":
                    $stmt = $conn->query("SELECT * FROM compteprofesseur");
                    $stmt->execute();
                    $professeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($professeurs as $professeur){
                        if($professeur['email']===$_POST['email'] && $professeur['motDePasse']===$_POST['motdepasse']){
                            $_SESSION["status"] = "professeur";
                            $_SESSION["id"] = $etudiant['id'];
                            header("location: index.php");
                        }
                    }
                    break;
            }
        }else{
            echo "veulliez remplir tout les champs";
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
        <h1>Connection</h1>
        <form method="post">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="motdepasse" placeholder="Mot de passe" required>

            <label for="typeCompte">Etudiant</label>
            <input type="radio" name="typeCompte" value="etudiant">
            <label for="typeCompte">Entreprise</label>
            <input type="radio" name="typeCompte" value="entreprise">
            <label for="typeCompte">Professeur</label>
            <input type="radio" name="typeCompte" value="professeur">
            
            <input type="submit" name="Connexion">
            
        </form>
        <div class="creerCompte">
            <a href="status.php">Crée un comtpe</a>
        </div>
    </div>
</body>


</html>