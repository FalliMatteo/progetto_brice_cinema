<?php
    include "connection.php";
    session_start();
    $connection = connectMySQL();
    function deleteAttore($connection, $id){
        $sql = "DELETE FROM attori WHERE CodAttore = '$id'";
        $connection->query($sql);
        if($connection->affected_rows > 0){
            $_SESSION["message"] = "Attore rimosso con successo <br><br>";
            $_SESSION["color"] = "green";
        }else{
            $_SESSION["message"] = "Errore: attore inesistente <br><br>";
            $_SESSION["color"] = "red";
        }
    }
    deleteRecensione($connection, $_POST["id"]);
    $connection->close();
    header("Location: ../index.php");
?>