<?php
    session_start();
    include "connection.php";
    $connection = connectMySQL();
    $id = $_POST["id"];
    $voto = $_POST["voto"];
    $sql = "UPDATE recensioni SET Voto = '$voto' WHERE IDRecensione = $id";
    $connection->query($sql);
    if($connection->affected_rows > 0){
        $_SESSION["message_recensioni"] = "<br><p style='color: green'><b>Recensione aggiornata con successo</b></p>";
    }else{
        $_SESSION["message_recensioni"] = "<br><p style='color: red'><b>Errore: recensione inesistente</b></p>";
    }
    $connection->close();
    header("Location: ../pages/recensioni.php");
?>