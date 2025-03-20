<?php
    include('./config.php');
    $stmt = $conn->prepare("DELETE FROM offrestage WHERE offreStage_Id = :dsid");
    $stmt->bindParam(':dsid', $_GET['id']);
    $stmt->execute();
    header("location: page_compte.php");
?>