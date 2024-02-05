<?php
    session_start();
    $connection = new mysqli("localhost", "root", "", "cinema");
    if($connection->connect_error){
        die($connection->connect_error);
    }
    function updateRecensione($connection, $id, $voto){
        if($voto >= 1 && $voto <= 5 && $id >= 1){
            $sql = "UPDATE recensioni SET Voto = '$voto' WHERE IDRecensione = '$id'";
            $connection->query($sql);
            if($connection->affected_rows > 0){
                $_SESSION["message"] = "Recensione aggiornata con successo <br><br>";
                $_SESSION["color"] = "green";
            }else{
                $_SESSION["message"] = "Errore: recensione inesistente <br><br>";
                $_SESSION["color"] = "red";
            }
        }else{
            $_SESSION["message"] = "Errore: valori inseriti invalidi <br><br>";
            $_SESSION["color"] = "red";
        }
    }
    updateRecensione($connection, $_POST["id"], $_POST["voto"]);
    $connection->close();
    header("Location: ../index.php");
?>