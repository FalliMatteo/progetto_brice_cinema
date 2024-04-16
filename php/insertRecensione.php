<?php
    session_start();
    include "connection.php";
    $connection = connectMySQL();
    $voto = $_POST["voto"];
    $film = $_POST["film"];
    $username = $_SESSION["username"];
    $sql = "SELECT * FROM recensioni WHERE Username = '$username' and CodFilm = $film";
    $result = $connection->query($sql);
    if($result->num_rows > 0){
        $_SESSION["message_recensioni"] = "<p style='color: red'><b>Errore: hai già votato questo film</b></p>";
    }else{
        $sql = "INSERT INTO recensioni (Voto, CodFilm, Username) VALUES('$voto', '$film', '$username')";
        $result = $connection->query($sql);
        if($result){
            $_SESSION["message_recensioni"] = "<p style='color: green'><b>Recensione aggiunta con successo</b></p>";
        }else{
            $_SESSION["message_recensioni"] = "<p style='color: red'><b>Errore: film inesistente</b></p>";
        }
    }
    $connection->close();
    header("Location: ../pages/recensioni.php");
?>