<?php
    session_start();
    $connection = new mysqli("localhost", "root", "", "cinema");
    if($connection->connect_error){
        die($connection->connect_error);
    }
    function deleteRecensione($connection, $id){
        $sql = "DELETE FROM recensioni WHERE IDRecensione = '$id'";
        $connection->query($sql);
        if($connection->affected_rows > 0){
            $_SESSION["message"] = "Recensione rimossa con successo <br><br>";
            $_SESSION["color"] = "green";
        }else{
            $_SESSION["message"] = "Errore: recensione inesistente <br><br>";
            $_SESSION["color"] = "red";
        }
    }
    deleteRecensione($connection, $_POST["id"]);
    $connection->close();
    header("Location: ../index.php");
?>