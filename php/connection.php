<?php
    function connectMySQL(){
        $connection = new mysqli("localhost", "root", "", "cinema");
        if($connection->connect_error){
            echo "<p style='color: red'>Errore di connessione al database</p>";
            exit();
        }
        return $connection;
    }
?>