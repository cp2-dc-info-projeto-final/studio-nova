<?php
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
    if(empty($email) OR empty($senha) OR empty($tipo)){
        echo "Você não fez o login!";
        echo "<p><a href='login.php'>Página de login</a></p>";
        exit;
    }
    else
    {
        if($tipo == "cliente"){
            include "conecta.php";
            $sql = "SELECT * FROM cliente WHERE email = '$email';";
            $res = mysqli_query($mysqli, $sql);
        }
        if($tipo == "funcionario"){
            include "conecta.php";
            $sql = "SELECT * FROM funcionario WHERE email = '$email';";
            $res = mysqli_query($mysqli, $sql);
        }        
        if($tipo == "administrador"){
            include "conecta.php";
            $sql = "SELECT * FROM administrador WHERE email = '$email';";
            $res = mysqli_query($mysqli, $sql);
        }
        // testa se não encontrou o e-mail no banco de dados
     
        if(mysqli_num_rows($res) != 1){
            unset($_SESSION["email"]);
            unset($_SESSION["senha"]);
            echo "<p>Você não fez o login!<p>";
            echo "<p><a href='login.php'>Página de login</a></p>";
            exit;
        }
        
        else{
            
            $usuario = mysqli_fetch_array($res);
            // testa se a senha está errada
            if($senha != $usuario["senha"]){
                unset($_SESSION["email"]);
                unset($_SESSION["senha"]);
                echo "Você não fez o login!";
                echo "<p><a href='login.php'>Página de login</a></p>";
                exit;
            }
        }
        mysqli_close($mysqli);
    }
    
?>
