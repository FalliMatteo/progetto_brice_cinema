<?php
    session_start();
    include "connection.php";
    include "getProiezioni.php";
    $connection = connectMySQL();
    $after = $_GET["inizio"];
    $before = $_GET["fine"];
    $_SESSION["proiezioni"] = getProiezioni($connection, $after, $before);
    $connection->close();
    header("Location: ../pages/proiezioni.php");
?>