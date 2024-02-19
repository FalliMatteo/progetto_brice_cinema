<?php
    include "../php/connection.php";
    include "../php/getProiezioni.php";
    session_start();
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
            <a id="link_recensioni" href="recensioni.php"><b>Recensioni</b></a>
            <a id="link_film" href="../index.php"><b>Film</b></a>
            <a id="link_proiezioni" href="" class="selected"><b>Proiezioni</b></a>
            <a id="link_tabelle" href="tabelle.php"><b>Tabelle</b></a>
        </div>
    </div>
    <div id="container">
        <br>
        <div class="row" data-masonry='{"percentPosition": true }'>
            <br>
            <form id="form_proiezioni" action="../php/filterProiezioni.php" method="GET" class="box">
                <p>Inserisci gli orari di filtraggio</p>
                <br>
                <label for="input_ora_inizio">Da:</label>
                <input type="time" id="input_ora_inizio" name="inizio" required>
                <label for="input_ora_fine">A:</label>
                <input type="time" id="input_ora_fine" name="fine" required>
                <br><br>
                <button type="submit">Filtra</button>
            </form>
            <br>
            <div id='proiezioni' class='box col-xs-12 col-sm-6 col-md-4 col-lg-3'>
                <?php
                    if(isset($_SESSION["proiezioni"])){
                        echo $_SESSION["proiezioni"];
                    }else{
                        $connection = connectMySQL();
                        echo getProiezioni($connection, "00:00:00", "23:59:59");
                        $connection->close();
                    }
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