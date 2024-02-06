<?php
    session_start();
    $connection = new mysqli("localhost", "root", "", "cinema");
    if($connection->connect_error){
        die($connection->connect_error);
    }
    function getRecensioni($connection){
        try{
            $sql = "SELECT * FROM recensioni JOIN film on recensioni.CodFilm = film.CodFilm";
            $result = $connection->query($sql);
            if($result->num_rows > 0){
                $string = "<div id='recensioni' class='container col-xs-12 col-sm-6 col-md-4 col-lg-3'>Recensioni presenti nel database: <br><br><ul>";
                while($row = $result->fetch_assoc()){
                    $string .= ("<li>".$row["IDRecensione"].", ".$row["Voto"].", ".$row["Titolo"].", ".$row["Username"]."</li>");
                }
                $string .= "</ul></div>";
            } else {
                $string = "Nessuna recensione presente nel database <br>";
            }
            $string .= "<br>";
        }catch(Exception $e){
            $string = $e->getMessage."<br><br>";
        }
        return $string;
    }
    function getFilm($connection){
        try{
            $sql = "SELECT * FROM film";
            $result = $connection->query($sql);
            if($result->num_rows > 0){
                $string = "<div id='film' class='container col-xs-12 col-sm-6 col-md-4 col-lg-3'>Film presenti nel database: <br><br><ul>";
                while($row = $result->fetch_assoc()){
                    $string .= ("<li>".$row["CodFilm"].", ".$row["Titolo"].", ".$row["AnnoProduzione"].", ".$row["Genere"]."</li>");
                }
                $string .= "</ul></div>";
            } else {
                $string = "Nessun film presente nel database <br>";
            }
            $string .= "<br>";
        }catch(Exception $e){
            $string = $e->getMessage."<br><br>";
        }
        return $string;
    }
    $recensioni = getRecensioni($connection);
    $film = getFilm($connection);
    $connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Gestione recensioni</title>
</head>
<body>
    <h1>Gestione recensioni</h1><br>
    <div class="row">
        <div id="select_div" class="container col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <p>Seleziona il tipo di query da effettuare</p>
            <input type="radio" id="insert_input" name="select" value="insert" onclick="updateInputs()" checked>
            <label for="insert_input"> Insert</label><br>
            <input type="radio" id="delete_input" name="select" value="delete" onclick="updateInputs()">
            <label for="delete_input"> Delete</label><br>
            <input type="radio" id="update_input" name="select" value="update" onclick="updateInputs()">
            <label for="update_input"> Update</label><br>
            <?php
                if(isset($_SESSION["color"])){
                    $color = $_SESSION["color"];
                }
                if(isset($_SESSION["message"])){
                    echo "<br><p style='color: $color'><b>" . $_SESSION["message"] . "</b></p>";
                }
            ?>
        </div>
        <br>
        <form id="form" action="php/insert.php" method="post" class="container col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div id="id" class="blocked">
                <label id="id_label" for="id_input">ID:</label><br>
                <input type="number" id="id_input" name="id" min="1"><br><br>
            </div>
            <div id="voto">
                <label id="voto_label" for="voto_input">Voto:</label><br>
                <input type="number" id="voto_input" name="voto" min="1" max="5"><br><br>
            </div>
            <div id="film">
                <label id="film_label" for="film_input">Codice film:</label><br>
                <input type="number" id="film_input" name="film" min="1"><br><br>
            </div>
            <div id="username">
                <label id="username_label" for="username_input">Username:</label><br>
                <input type="text" id="username_input" name="username"><br><br>
            </div><br>
            <input type="submit" value="Esegui">
        </form>
        <?php
            echo "<br>" . $recensioni;
            echo "<br>" . $film;
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>