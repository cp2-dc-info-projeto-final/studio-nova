<?php
    session_start();
    include_once("conecta.php");

    $nome = $_POST ["nome"];
    $email = $_POST ["email"];
    $senha1 = $_POST ["senha1"];
    $senha2 = $_POST ["senha2"];
    $tel = $_POST["tel"];
    $cpf = $_POST["cpf"];
    $tipo = "funcionario";
    $erro = 0;

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
        $sql = "INSERT INTO funcionario (nome,email,senha,cpf,tel,tipo)";
        $sql .= "VALUES ('$nome','$email','$senha2','$cpf','$tel','$tipo');";  
        mysqli_query($mysqli,$sql);
        mysqli_close($mysqli);

        echo "Funcionário cadastrado com sucesso!<br>";
    }
   
    
?>