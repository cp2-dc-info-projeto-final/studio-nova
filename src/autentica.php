<?php
    session_start();
    if(isset($_SESSION["email"])){
        $email = $_SESSION["email"];
    }
    if(isset($_SESSION["senha"])){
        $senha = $_SESSION["senha"];
    }
    if(empty($email) OR empty($senha)){
        echo "Você não fez o login!";
        echo "<p><a href='login.php'>Página de login</a></p>";
        exit;
    }
    else
    {

        echo "entrei no else";
        include "conecta.php";
        $sql = "SELECT * FROM cliente WHERE email = '$email';";
        $res = mysqli_query($mysqli, $sql);
        
        $sql = "SELECT * FROM funcionario WHERE email = '$email';";
        $res_fun = mysqli_query($mysqli, $sql);
        
        $sql = "SELECT * FROM administrador WHERE email = '$email';";
        $res_adm = mysqli_query($mysqli, $sql);

        // testa se não encontrou o e-mail no banco de dados
     
        if(mysqli_num_rows($res) != 1){
            unset($_SESSION["email"]);
            unset($_SESSION["senha"]);
            echo "<p>Você não fez o login!<p>";
            echo "<p><a href='login.php'>Página de login</a></p>";
            exit;
        }
        elseif(mysqli_num_rows($res_fun) != 1){
            unset($_SESSION["email"]);
            unset($_SESSION["senha"]);
            echo "<p>Você não fez o login!<p>";
            echo "<p><a href='login.php'>Página de login</a></p>";
            exit;
        }
        elseif(mysqli_num_rows($res_adm) != 1){
            unset($_SESSION["email"]);
            unset($_SESSION["senha"]);
            echo "<p>Você não fez o login!<p>";
            echo "<p><a href='login.php'>Página de login</a></p>";
            exit;
        }
        else{
            $cliente = mysqli_fetch_array($res);
            $funcionario = mysqli_fetch_array($res_fun);
            $administrador = mysqli_fetch_array($res_adm);
            // testa se a senha está errada
            if($senha != $cliente["senha"] or $senha != $funcionario["senha"] or $senha != $administrador["senha"]){
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
