<?php
    session_start();
    include_once("conecta.php");

    $nome = $_POST ["nome"];
    $email = $_POST ["email"];
    $senha1 = $_POST ["senha1"];
    $senha2 = $_POST ["senha2"];
    $erro = 0;
    $error = "";

    if(empty($nome) or strstr($nome, ' ') == false)
    {
        echo "Por favor, insira seu nome";
        $erro = 1;
    }
    if(($senha1 == $senha2) == false)
    {
        echo "As senhas não são correspondentes.<br>";
        $erro = 1;
    }
    if($email == $senha2)
    {
        echo "O email e a senha não podem ser iguais.<br>";
        $erro = 1;
    }

    if($erro == 0)
    {
        $mysqli = mysqli_connect("localhost","nova","admin","novastudio");
        $sql = "INSERT INTO usuario (nome,email,senha)";
        $sql .= "VALUES ('$nome','$email','$senha2');";  
        mysqli_query($mysqli,$sql);
        mysqli_close($mysqli);

        header("location: paginainicial.php");
    }
   
    
?>
