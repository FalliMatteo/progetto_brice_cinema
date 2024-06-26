<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../index.php");
    }
    include "../php/connection.php";
    include "../php/getRecensioni.php";
    $connection = connectMySQL();
    $recensioni = getRecensioni($connection);
    $connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/castagna.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Brice Cinema</title>
</head>
<body background="../img/sfondo.png">
    <div id="head">
        <div id="title">
            <br><br>
            <h1><img src="../img/castagna.png" id="logo"> Brice Cinema</h1>
            <br><br>
        </div>
        <div id="navbar">
            <a id="link_recensioni" href="" class="selected"><b>Recensioni</b></a>
            <a id="link_film" href="film.php"><b>Film</b></a>
            <a id="link_proiezioni" href="proiezioni.php"><b>Proiezioni</b></a>
            <a id="link_tabelle" href="tabelle.php"><b>Tabelle</b></a>
            <a id="link_logout" href="../php/logout.php"><b>Logout</b></a>
        </div>
    </div>
    <div id="container">
        <br>
        <div class="row" data-masonry='{"percentPosition": true }'>
            <div id="query_recensioni_div" class="box">
                <p style="margin-left: 1em; margin-right: 6em">Che cosa vuoi fare?</p>
                <div class="radio">
                    <input type="radio" id="insert_recensione_input" name="query_recensioni" value="insert_recensione" onclick="updateInputs()" checked>
                    <label for="insert_recensione_input" class="radio_label">Inserire una recensione</label>
                </div>
                <div class="radio">
                    <input type="radio" id="delete_recensione_input" name="query_recensioni" value="delete_recensione" onclick="updateInputs()">
                    <label for="delete_recensione_input" class="radio_label">Eliminare una recensione</label>
                </div>
                <div class="radio">
                    <input type="radio" id="update_recensione_input" name="query_recensioni" value="update_recensione" onclick="updateInputs()">
                    <label for="update_recensione_input" class="radio_label">Modificare una recensione</label>
                </div>
                <div class="message">
                <?php
                    if(isset($_SESSION["message_recensioni"])){
                        echo $_SESSION["message_recensioni"];
                    }
                ?>
                </div>
            </div>
            <br>
            <form id="form_recensioni" action="../php/insertRecensione.php" method="post" class="box">
                <div id="id" class="blocked input_group">
                    <input type="number" id="id_input" name="id" min="1" placeholder="ID" class="input_field">
                </div>
                <div id="voto" class="input_group">
                    <input type="number" id="voto_input" name="voto" min="1" max="5" placeholder="Voto" class="input_field" required>
                </div>
                <div id="film" class="input_group">
                    <input type="number" id="film_input" name="film" min="1" placeholder="Codice film" class="input_field" required>
                </div><br><br>
                <button type="submit" class="submit">Esegui</button>
            </form>
            <br>
            <div id='recensioni' class='box'>
                <?php
                    echo $recensioni;
                ?>
            </div>
        </div>
        <br><br>
    </div>
    <div id="footer"><p>Raggiolo in mezzo a due fiumi giace, la sua ricchezza sono le brice, ma se le brice non vengono al bono, vedo ballar Raggiolo senza sòno  -  Paolo Borsellino</p></div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>
</html>