<?php
    include "connection.php";
    include "getProiezioni.php";
    $connection = connectMySQL();
    session_start();
    $after = $_GET["inizio"];
    $before = $_GET["fine"];
    $_SESSION["proiezioni"] = getProiezioni($connection, $after, $before);
    $connection->close();
    header("Location: ../pages/proiezioni.php");
?>