<?php
    session_start();
    function getProiezioni($connection, $after, $before){
        if($after < $before){
            $sql = "SELECT P.CodProiezione, F.Titolo, P.OraProiezione FROM proiezioni as P JOIN film as F on P.CodFilm = F.CodFilm WHERE P.CodSala = 8 AND (P.OraProiezione BETWEEN '$after' AND '$before')";
            $result = $connection->query($sql);
            if($result){
                if($result->num_rows > 0){
                    $string = "Proiezioni disponibili: <br><br><table>";
                    $string .= "<tr><th>ID</th><th>Film</th><th>Orario</th></tr>";
                    while($row = $result->fetch_assoc()){
                        $string .= ("<tr><td>".$row["CodProiezione"]."</td><td>".$row["Titolo"]."</td><td>".$row["OraProiezione"]."</td></tr>");
                    }
                    $string .= "</table>";
                } else {
                    $string = "Nessuna proiezione disponibile <br>";
                }
            }else{
                $string = "Errore del server<br>";
            }
        }else{
            $string = "Il periodo inserito è invalido<br>";
        }
        return $string;
    }
?>