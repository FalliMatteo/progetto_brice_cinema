<?php
    include "connection.php";
    session_start();
    $connection = connectMySQL();
    $tabella = $_GET["tabella"];
    $sql = "SELECT * FROM '$tabella'";
    $result = $connection->query($sql);
    if($result){
        if($result->num_rows > 0){
            $string = "<table>";
            while($row = $result->fetch_assoc()){
                $string .= "<tr>";
                foreach($row as $val){
                    $string .= "<td>$val</td>";
                }
                $string .= "</tr>";
            }
            $string .= "</table>";
        }else{
            $string = "Tabella vuota <br>";
        }
    }else{
        $string = "$tabella <br>";
    }
    $_SESSION["tabella"] = $string;
    header("Location: ../pages/tabelle.php");
?>