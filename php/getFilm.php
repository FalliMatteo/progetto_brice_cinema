<?php
    function getFilm($connection){
        $sql = "SELECT F.* FROM film as F JOIN proiezioni as P on F.CodFilm = P.CodFilm WHERE P.CodSala = 8";
        $result = $connection->query($sql);
        if($result){
            if($result->num_rows > 0){
                $string = "Film disponibili: <br><br><table>";
                $string .= "<tr><th class='id_film'>ID</th><th>Titolo</th><th class='anno_produzione_film'>Anno produzione</th><th class='genere_film'>Genere</th></tr>";
                while($row = $result->fetch_assoc()){
                    $string .= ("<tr><td class='id_film'>".$row["CodFilm"]."</td><td>".$row["Titolo"]."</td><td class='anno_produzione_film'>".$row["AnnoProduzione"]."</td><td class='genere_film'>".$row["Genere"]."</td></tr>");
                }
                $string .= "</table>";
            } else {
                $string = "Nessun film presente nel database <br>";
            }
        }else{
            $string = "<span style='color: red'>Errore del server</span><br>";
        }
        return $string;
    }
?>