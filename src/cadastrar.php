<?php

    $nome = $_POST ["nome"];
    $email = $_POST ["email"];
    $senha1 = $_POST ["senha1"];
    $senha2 = $_POST ["senha2"];
    $erro = 0;

    if(empty($nome) or strstr($nome, ' ') == false)
    {
        echo "Por favor, preencha o nome completo.<br>";
        $erro = 1;
    }

    if(strlen($email) < 10 or strstr($email, '@') == false)
    {
        echo "Por favor, preencha o e-mail corretamente.<br>";
        $erro = 1;
    }

    if(($senha1 = $senha2) == false)
    {
        echo "As senhas não são correspondentes.<br>";
        $erro = 1;
    }

    if($erro == 0)
    {
        $mysqli = mysqli_connect("localhost","admin","123","nova");
        $sql = "INSERT INTO cliente (nome,email,senha)";
        $sql .= "VALUES ('$nome','$email','$senah2');";  
        mysqli_query($mysqli,$sql);
        mysqli_close($mysqli);

    }
    
?>

