<?php
    include('./config.php');
    if(isset($_POST['Connexion'])){
        if(!empty($_POST['identifiant']) && !empty($_POST['motdepasse'])){
            
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

<body class="connection">
    <div>
        <h1>Connection</h1>
        <form method="post">
            <input type="text" name="identifiant" placeholder="Email" required>
            <input type="password" name="motdepasse" placeholder="Mot de passe" required>
            <label for="typeCompte">Etudiant</label>
            <input type="radio" name="typeCompte" value="etudiant">
            <label for="typeCompte">Entreprise</label>
            <input type="radio" name="typeCompte" value="entreprise">
            <label for="typeCompte">Professeur</label>
            <input type="radio" name="typeCompte" value="professeur">
            <input type="submit" name="Connexion">
        </form>
        
    </div>
</body>


</html>