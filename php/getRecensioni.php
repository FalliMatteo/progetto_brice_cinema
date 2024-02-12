<?php
    function getRecensioni($connection){
        try{
            $sql = "SELECT * FROM recensioni JOIN film on recensioni.CodFilm = film.CodFilm";
            $result = $connection->query($sql);
            if($result->num_rows > 0){
                $string = "Recensioni presenti nel database: <br><br><table>";
                $string .= "<tr><th>ID</th><th>Voto</th><th>Film</th><th>Username</th></tr>";
                while($row = $result->fetch_assoc()){
                    $string .= ("<tr><td>".$row["IDRecensione"]."</td><td>".$row["Voto"]."</td><td>".$row["Titolo"]."</td><td>".$row["Username"]."</td></tr>");
                }
                $string .= "</table>";
            } else {
                $string = "Nessuna recensione presente nel database <br>";
            }
            $string .= "<br>";
        }catch(Exception $e){
            $string = $e->getMessage."<br><br>";
        }
        return $string;
    }
?>