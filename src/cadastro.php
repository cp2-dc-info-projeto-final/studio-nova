
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <title>cadastro</title>
    <style>

        body{
            background-color: rgb(30, 24, 35);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="img-box">
            <a href="index.php"><img src="img/logo.png" alt="" class="img1"></a>
        </div>
        <div class="form-box">
            <form action="cadastro.php" method="POST">
            
                <h2>Crie sua conta</h2>
            
                <p>É necessário estar cadastrado para fazer o agendamento</p>
            
                <p>Já possui conta ?</p>
                <a href="login.php">Clique aqui</a><br>
                

                <div class="input-group w50">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" placeholder=" Digite aqui seu nome" required>
                </div>
                <div class="input-group w50">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" name="sobrenome" placeholder=" Digite aqui seu sobrenome" required>
                </div>
               
                <div class="input-group">
                    <label for="email">Informe seu e-mail</label>
                    <input type="text" name="email" placeholder=" Digite aqui seu email" title="formato" pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                </div>

                <div class="input-group w50">
                    <label for="senha1">Crie sua senha</label>
                    <input type="password" name="senha1" placeholder=" Crie sua senha" maxlength="14" required>
                </div>
                <div class="input-group w50">
                    <label for="senha2">Confirme sua senha</label>    
                    <input type="password" name="senha2" placeholder=" Confirme sua senha" maxlength="14" required>
                </div>
                <?php
    
                    session_start();
                    include_once("conecta.php");

                    if(isset($_POST["nome"]) || isset($_POST["sobrenome"]) ||isset($_POST["email"]) || isset($_POST["senha1"]) || isset($_POST["senha2"])  ) 
                        {

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

                                $mysqli = mysqli_connect("localhost","nova","admin","novastudio");
                                $sql = "INSERT INTO usuario (nome,email,sobrenome,senha) VALUES ('$nome','$email','$sobrenome','$senha2');";  
                                
                                session_start();
                                $_SESSION['nome'] = $nome;
                                $_SESSION['email'] = $email;
                                $_SESSION['senha'] = $senha2;
                                $_SESSION['tipo'] = "cliente";

                                mysqli_query($mysqli,$sql);
                                mysqli_close($mysqli);
                                
                                header("location: paginainicial.php");
                            }
                        }
?>
                <input type="submit" class="btn" value="Cadastrar-se">
                
            </form>
        </div>
    </div>
</body>
</html>
