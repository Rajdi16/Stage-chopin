<?php
    session_start();
    include('./config.php');
        $stmt = $conn->prepare("UPDATE compteentreprise SET email=:email, ville=:ville, adresse=:adresse, codePostal=:codePostal, site=:site  WHERE entreprise_Id=:id");
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':ville', $_POST['ville']);
        $stmt->bindParam(':adresse', $_POST['adresse']);
        $stmt->bindParam(':codePostal', $_POST['codePostal']);
        $stmt->bindParam(':site', $_POST['site']);
        $stmt->bindParam(':id', $_SESSION['id']);
        $stmt->execute();
        
        header("location: page_compte.php");
?>