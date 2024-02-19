<?php
    include "connection.php";
    session_start();
    $connection = connectMySQL();
    function insertRecensione($connection, $voto, $film, $username){
        $sql = "INSERT INTO recensioni (Voto, CodFilm, Username) VALUES('$voto', '$film', '$username')";
        $connection->query($sql);
        if($connection->affected_rows > 0){
            $_SESSION["message"] = "Recensione aggiunta con successo <br><br>";
            $_SESSION["color-1"] = "green";
        }else{
            $_SESSION["message"] = "Errore: film inesistente <br><br>";
            $_SESSION["color-1"] = "red";
        }
    }
    insertRecensione($connection, $_POST["voto"], $_POST["film"], $_POST["username"]);
    $connection->close();
    header("Location: ../pages/recensioni.php");
?>