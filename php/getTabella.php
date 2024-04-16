<?php
    session_start();
    include "connection.php";
    $connection = connectMySQL();
    $tabella = $_GET["tabella"];
    $sql = "SELECT * FROM $tabella";
    $result = $connection->query($sql);
    if($result){
        if($result->num_rows > 0){
            if($tabella == "attori"){
                $string = "<p>Attori presenti nel database:</p>";
                $head = array("ID", "Nome", "Anno di nascita", "Nazione");
            }
            if($tabella == "film"){
                $string = "<p>Film presenti nel database:</p>";
                $head = array("ID", "Titolo", "Anno di produzione", "Nazione", "Regista", "Genere");
            }
            if($tabella == "sale"){
                $string = "<p>Cinema presenti nel database:</p>";
                $head = array("ID", "Posti", "Nome", "Città", "Anno di apertura");
            }
            $string .= "<table>";
            $first = true;
            while($row = $result->fetch_assoc()){
                $string .= "<tr>";
                if($first){
                    foreach($head as $val){
                        $string .= "<th>$val</th>";
                    }
                }else{
                    foreach($row as $val){
                        $string .= "<td>$val</td>";
                    }
                }
                $string .= "</tr>";
                $first = false;
            }
            $string .= "</table>";
        }else{
            $string = "Tabella vuota <br>";
        }
    }else{
        $string = "Errore del server <br>";
    }
    $_SESSION["tabella"] = $string;
    header("Location: ../pages/tabelle.php");
?>