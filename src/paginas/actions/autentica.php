<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/nova.css">
    <title>Usuário não encontrado</title>
    
</head>
<body>
<?php
    include "conecta.php";
    session_start();

    if(isset($_SESSION["email"])){
        $email = $_SESSION["email"];
    }
    if(isset($_SESSION["senha"])){
        $senha = $_SESSION["senha"];
    }
    if(isset($_SESSION["tipo"])){
        $tipo = $_SESSION["tipo"];
    }
    if(isset($_SESSION["id"])){
        $id = $_SESSION["id"];
    }
    if(empty($email) OR empty($senha) OR empty($tipo)){
        echo "Você não fez o login!";
        echo "<p><a href='../login/login.php'>Página de login</a></p>";
        exit;
    }
    else
    {
        if($tipo == "cliente"){
            include "conecta.php";
            $sql = "SELECT * FROM usuario WHERE email = '$email';";
            $res = mysqli_query($mysqli, $sql);
        }
        else if($tipo == "funcionario"){
            include "conecta.php";
            $sql = "SELECT * FROM funcionario WHERE email = '$email';";
            $res = mysqli_query($mysqli, $sql);
        }        
        else if($tipo == "administrador"){
            include "conecta.php";
            $sql = "SELECT * FROM administrador WHERE email = '$email';";
            $res = mysqli_query($mysqli, $sql);
        }
        // testa se não encontrou o e-mail no banco de dados
        else if(mysqli_num_rows($res) != 1){
            unset($_SESSION["email"]);
            unset($_SESSION["senha"]);
            echo "<p>Você não fez o login!<p>";
            echo "<p><a href='../login/login.php'>Página de login</a></p>";
            exit;
        }
        
        else{
            
            $usuario = mysqli_fetch_array($res);
            // testa se a senha está errada
            if(!hash_equals ($senha, $usuario["senha"])){
                unset($_SESSION["email"]);
                unset($_SESSION["senha"]);
                echo "Você não fez o login!";
                echo "<p><a href='../login/login.php'>Página de login</a></p>";
                exit;
            }
        }
        mysqli_close($mysqli);
    }
?>
</body>
</html>
