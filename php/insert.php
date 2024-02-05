<?php
    session_start();
    $connection = new mysqli("localhost", "root", "", "cinema");
    if($connection->connect_error){
        die($connection->connect_error);
    }
    function insertRecensione($connection, $voto, $film, $username){
        if($voto >= 1 && $voto <= 5 && $film >= 1 && $username != ""){
            $sql = "INSERT INTO recensioni (Voto, CodFilm, Username) VALUES('$voto', '$film', '$username')";
            $connection->query($sql);
            if($connection->affected_rows > 0){
                $_SESSION["message"] = "Recensione aggiunta con successo <br><br>";
                $_SESSION["color"] = "green";
            }else{
                $_SESSION["message"] = "Errore: film inesistente <br><br>";
                $_SESSION["color"] = "red";
            }
        }else{
            $_SESSION["message"] = "Errore: valori inseriti invalidi <br><br>";
            $_SESSION["color"] = "red";
        }
    }
    insertRecensione($connection, $_POST["voto"], $_POST["film"], $_POST["username"]);
    $connection->close();
    header("Location: ../index.php");
?>