<?php
session_start();
    
    $nome = $_POST ["nome"];
    $email = $_POST ["email"];
    $senha1 = $_POST ["senha1"];
    $senha2 = $_POST ["senha2"];
    $erro = 0;
    $error = "";

    if(empty($nome) or strstr($nome, ' ') == false)
    {
        echo "Por favor, insira seu nome";
        $erro = "errou";
    }
                

    if(strlen($email) < 10 or strstr($email, '@') == false)
    {
        echo "Por favor, preencha o e-mail corretamente.<br>";
        $erro = 1;
    }
    if(strlen($senha1) < 8 or strlen($senha2) < 8)
    {
        echo "A senha deve ter no mínimo 8 caracteres.<br>";
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
        /*$mysqli = mysqli_connect("localhost","admin","admin","nova");
        $sql = "INSERT INTO cliente (nome,email,senha)";
        $sql .= "VALUES ('$nome','$email','$senha2');";  
        mysqli_query($mysqli,$sql);
        mysqli_close($mysqli);*/

        header("location: paginainicial.php");
    }
    else
    {
        
        $error = $erro;

    }
    
?>
