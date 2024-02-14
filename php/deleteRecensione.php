<?php
    include "connection.php";
    session_start();
    $connection = connectMySQL();
    function deleteRecensione($connection, $id){
        $sql = "DELETE FROM recensioni WHERE IDRecensione = '$id'";
        $connection->query($sql);
        if($connection->affected_rows > 0){
            $_SESSION["message"] = "Recensione rimossa con successo <br><br>";
            $_SESSION["color-1"] = "green";
        }else{
            $_SESSION["message"] = "Errore: recensione inesistente <br><br>";
            $_SESSION["color-1"] = "red";
        }
    }
    deleteRecensione($connection, $_POST["id"]);
    $connection->close();
    header("Location: ../pages/recensioni.php");
?>