<?php
    session_start();
    include('./config.php');
        $stmt = $conn->prepare("UPDATE compteetudiant SET email=:email, classe=:classe WHERE etudiant_Id=:id");
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':classe', $_POST['classe']);
        $stmt->bindParam(':id', $_SESSION['id']);
        $stmt->execute();

        header("location: page_compte.php");
?>