<?php
    session_start();
    include('./config.php');
        $stmt = $conn->prepare("UPDATE compteprofesseur SET email=:email, WHERE prof_Id=:id");
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':id', $_SESSION['id']);
        $stmt->execute();
    
        header("location: page_compte.php");
?>