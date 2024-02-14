<?php
    include "connection.php";
    session_start();
    $connection = connectMySQL();
    function updateRecensione($connection, $id, $voto){
        if($voto >= 1 && $voto <= 5 && $id >= 1){
            $sql = "UPDATE recensioni SET Voto = '$voto' WHERE IDRecensione = '$id'";
            $connection->query($sql);
            if($connection->affected_rows > 0){
                $_SESSION["message"] = "Recensione aggiornata con successo <br><br>";
                $_SESSION["color-1"] = "green";
            }else{
                $_SESSION["message"] = "Errore: recensione inesistente <br><br>";
                $_SESSION["color-1"] = "red";
            }
        }else{
            $_SESSION["message"] = "Errore: valori inseriti invalidi <br><br>";
            $_SESSION["color-1"] = "red";
        }
    }
    updateRecensione($connection, $_POST["id"], $_POST["voto"]);
    $connection->close();
    header("Location: ../pages/recensioni.php");
?>