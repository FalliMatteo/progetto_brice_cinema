<?php
    function getFilm($connection){
        try{
            $sql = "SELECT * FROM film";
            $result = $connection->query($sql);
            if($result->num_rows > 0){
                $string = "Film presenti nel database: <br><br><table>";
                $string .= "<tr><th class='id_film'>ID</th><th>Titolo</th><th class='anno_produzione_film'>Anno produzione</th><th class='genere_film'>Genere</th></tr>";
                while($row = $result->fetch_assoc()){
                    $string .= ("<tr><td class='id_film'>".$row["CodFilm"]."</td><td>".$row["Titolo"]."</td><td class='anno_produzione_film'>".$row["AnnoProduzione"]."</td><td class='genere_film'>".$row["Genere"]."</td></tr>");
                }
                $string .= "</table>";
            } else {
                $string = "Nessun film presente nel database <br>";
            }
            $string .= "<br>";
        }catch(Exception $e){
            $string = $e->getMessage."<br><br>";
        }
        return $string;
    }
?>