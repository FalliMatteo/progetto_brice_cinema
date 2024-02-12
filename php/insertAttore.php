<?php
    include "connection.php";
    session_start();
    $connection = connectMySQL();
    function insertRecensione($connection, $nome, $anno, $nazione){
        if($anno >= 1900 && $anno <= 2024 && $nome != "" && $nazione != ""){
            $sql = "INSERT INTO attori (Nome, AnnoNascita, Nazionalita) VALUES('$nome', '$anno', '$nazione')";
            $connection->query($sql);
            if($connection->affected_rows > 0){
                $_SESSION["message"] = "Attore aggiunto con successo <br><br>";
                $_SESSION["color"] = "green";
            }else{
                $_SESSION["message"] = "Errore del backend <br><br>";
                $_SESSION["color"] = "red";
            }
        }else{
            $_SESSION["message"] = "Errore: valori inseriti invalidi <br><br>";
            $_SESSION["color"] = "red";
        }
    }
    insertRecensione($connection, $_POST["nome"], $_POST["anno"], $_POST["nazione"]);
    $connection->close();
    header("Location: ../index.php");
?>