<?php
    include "php/connection.php";
    include "php/getRecensioni.php";
    include "php/getFilm.php";
    session_start();
    $connection = connectMySQL();
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Gestione recensioni</title>
</head>
<body>
    <br>
    <h1>Gestione recensioni</h1>
    <br>
    <div class="navbar"></div>
    <br>
    <div class="row">
        <div id="query_recensioni_div" class="container col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <p>Seleziona il tipo di query da effettuare</p>
            <input type="radio" id="insert_recensione_input" name="query_recensioni" value="insert_recensione" onclick="updateInputs()" checked>
            <label for="insert_recensione_input"> Inserisci recensione</label><br>
            <input type="radio" id="delete_recensione_input" name="query_recensioni" value="delete_recensione" onclick="updateInputs()">
            <label for="delete_recensione_input"> Delete recensione</label><br>
            <input type="radio" id="update_recensione_input" name="query_recensioni" value="update_recensione" onclick="updateInputs()">
            <label for="update_recensione_input"> Update recensione</label><br>
            <?php
                $color = "";
                if(isset($_SESSION["color"])){
                    $color = $_SESSION["color"];
                }
                if(isset($_SESSION["message"])){
                    echo "<br><p style='color: $color'><b>" . $_SESSION["message"] . "</b></p>";
                }
            ?>
        </div>
        <br>
        <form id="form" action="php/insertRecensione.php" method="post" class="container col-xs-12 col-sm-6 col-md-4 col-lg-3">
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
        <br>
        <div id='recensioni' class='container col-xs-12 col-sm-6 col-md-4 col-lg-3'>
            <?php
                echo $recensioni;
            ?>
        </div>
        <br>
        <div id='film' class='container col-xs-12 col-sm-6 col-md-4 col-lg-3'>
            <input type="checkbox" id="id_film_box" onclick="showAttributes()">
            <label id="id_film_label" for="id_film_box"> Nascondi ID</label><br>
            <input type="checkbox" id="anno_produzione_film_box" onclick="showAttributes()">
            <label id="anno_produzione_film_label" for="anno_produzione_film_box"> Nascondi anno di produzione</label><br>
            <input type="checkbox" id="genere_film_box" onclick="showAttributes()">
            <label id="genere_film_label" for="genere_film_box"> Nascondi genere</label><br><br>
            <?php
                echo $film;
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>