<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    echo "$tipo";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <title>Acesso negado</title>
</head>
<body>
    <center>
    <h1>ACESSO NEGADO!!!</h1>
    <p>Você não tem permissão para acessar essa página</p><br>
    <a href="login/login.php" class="btn">Voltar para a página de login</a>
    </center>
</body>
</html>