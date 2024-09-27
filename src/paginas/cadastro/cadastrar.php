<?php
    session_start();
    include_once("../actions/conecta.php");

    $action = $_REQUEST["action"];

        if($tipo == "administrador") || ($action == "cadastrarAdm"){
        
            session_start();
            include_once("../actions/conecta.php");

                if(isset($_POST["email"]) || isset($_POST["senha1"]) || isset($_POST["senha2"]) ) 
                {
                        $email = $_POST ["email"];
                        $senha1 = $_POST ["senha1"];
                        $senha2 = $_POST ["senha2"];
                        $erro = 0;

                if(($senha1 != $senha2))
                    {
                        echo "<p>As senhas não são correspondentes</p>";
                        $erro = 1;
                    }
                if($email == $senha2)
                    {
                        echo "O email e a senha não podem ser iguais.<br>";
                        $erro = 1;
                    }

                if($erro == 0)
                    {   
                        $senha_cript = password_hash($senha2, PASSWORD_DEFAULT);
                        $mysqli = mysqli_connect("localhost","nova","admin","novastudio");
                        $sql = "INSERT INTO administrador (email,senha)";
                        $sql .= "VALUES ('$email','$senha2');";  
                        mysqli_query($mysqli,$sql);
                        mysqli_close($mysqli);

                        echo "Administrador cadastrado com sucesso!<br>";
                    }
            }
        }
        
        else{
            if(isset($_POST["nome"]) || isset($_POST["sobrenome"]) ||isset($_POST["email"]) || isset($_POST["senha1"]) || isset($_POST["senha2"])  ) {

                $nome = $_POST ["nome"];
                $sobrenome = $_POST ["sobrenome"];
                $email = $_POST ["email"];
                $senha1 = $_POST ["senha1"];
                $senha2 = $_POST ["senha2"];
                $erro = 0;

                $sql = "SELECT * FROM usuario WHERE email = '$email';";
                $res = mysqli_query($mysqli, $sql);
        
                //testa se já existe o e-mail cadastrado
                if(mysqli_num_rows($res) == 1){
                    echo "E-mail já cadastrado. Por favor, digite outro e-mail.<br>";
                    $erro = 1;
                }

                if(($senha1 != $senha2)){
                    echo "<p>As senhas não são correspondentes</p>";
                    $erro = 1;
                }
                
                if($email == $senha2){
                    echo "O email e a senha não podem ser iguais.<br>";
                    $erro = 1;
                }

                if($erro == 0){   

                    $senha_cript = password_hash($senha2 , PASSWORD_DEFAULT);
                    $mysqli = mysqli_connect("localhost","nova","admin","novastudio");
                    $sql = "INSERT INTO usuario (nome,email,sobrenome,senha) VALUES ('$nome','$email','$sobrenome','$senha_cript');";  
                    
                    session_start();
                    $_SESSION['nome'] = $nome;
                    $_SESSION['email'] = $email;
                    $_SESSION['senha'] = $senha_cript;
                    $_SESSION['tipo'] = "cliente";
                    $_SESSION['bemvindo'] = "Bem vindo !";

                    mysqli_query($mysqli,$sql);
                    mysqli_close($mysqli);
                    
                    header("location: ../home/paginainicial.php");
                }
            }
        }
?>