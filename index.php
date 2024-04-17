<?php
    session_start();
    unset($_SESSION["message_login"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/castagna.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Brice cinema</title>
</head>
<body background="img/sfondo.png">
    <div id="head">
        <div id="title">
            <br><br>
            <h1><img src="img/castagna.png" id="logo"> Brice Cinema</h1>
            <h2>Pagina di registrazione</h2>
            <br>
        </div>
    </div>
    <div class="container access_page">
        <div class="box access_form">
            <form action="php/createUtente.php" method="post">
                <div class="input_group">
                    <input id="input_username" type="text" name="username" placeholder="Username" class="input_field" maxlength="20" required>
                </div>
                <div class="input_group">
                    <input id="input_password" type="password" name="password" placeholder="Password" class="input_field" minlength="8" required>
                </div>
                <div class="input_group">
                    <input id="input_email" type="email" name="email" placeholder="E-mail" class="input_field" maxlength="40" required>
                </div>
                <div class="input_group">
                    <input id="input_nome" type="text" name="nome" placeholder="Nome" class="input_field" maxlength="20" required>
                </div>
                <div class="input_group">
                    <input id="input_cognome" type="text" name="cognome" placeholder="Cognome" class="input_field" maxlength="20" required>
                </div><br>
                <button type="submit">Registrati</button>
            </form>
            <br>
            <?php
                if(isset($_SESSION["message_signup"])){
                    echo "<p style='color: red'>" . $_SESSION["message_signup"] . "</p>";
                }
            ?>
            <br>
            <button class="access_button" onclick="window.location.href = 'pages/login.php'">Recupera il tuo account</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>