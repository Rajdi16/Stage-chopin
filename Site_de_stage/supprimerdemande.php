<?php
    include('./config.php');
    $stmt = $conn->prepare("DELETE FROM demandestage WHERE demandeStage_Id = :dsid");
    $stmt->bindParam(':dsid', $_GET['id']);
    $stmt->execute();
    header("location: page_compte.php");
?>