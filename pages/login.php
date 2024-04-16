<?php
    session_start();
    unset($_SESSION["message_signup"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/castagna.ico" />
    <link rel="stylesheet" href="../css/styles.css">
    <title>Accesso</title>
</head>
<body>
    <h1>Pagina di accesso</h1>
    <form action="../php/verifyUtente.php" method="post">
        <label for="input_username">Username</label><br>
        <input id="input_username" type="text" name="username" required><br><br>
        <label for="input_password">Password</label><br>
        <input id="input_password" type="password" name="password" required><br><br>
        <button type="submit">Accedi</button>
    </form><br>
    <?php
        if(isset($_SESSION["message_login"])){
            echo "<p style='color: red'>" . $_SESSION["message_login"] . "</p><br>";
        }
    ?>
    <a href="../index.php">Registrati</a>
</body>
</html>