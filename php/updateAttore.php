<?php
    include "connection.php";
    session_start();
    $connection = connectMySQL();
    function updateRecensione($connection, $id, $nazione){
        if($nazione != ""){
            $sql = "UPDATE attori SET Nazionalita = '$nazione' WHERE CodAttore = '$id'";
            $connection->query($sql);
            if($connection->affected_rows > 0){
                $_SESSION["message"] = "Attore aggiornato con successo <br><br>";
                $_SESSION["color"] = "green";
            }else{
                $_SESSION["message"] = "Errore: attore inesistente <br><br>";
                $_SESSION["color"] = "red";
            }
        }else{
            $_SESSION["message"] = "Errore: valori inseriti invalidi <br><br>";
            $_SESSION["color"] = "red";
        }
    }
    updateRecensione($connection, $_POST["id"], $_POST["nazione"]);
    $connection->close();
    header("Location: ../index.php");
?>