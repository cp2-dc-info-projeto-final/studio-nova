<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <title>Cadastro de funcionários</title>
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
            <a href="administracao.php"><img src="img/logo.png" alt="" class="img1"></a>
        </div>
        <div class="form-box">
            <form action="cadastroadm.php" method="POST">
            
                <h2>Cadastro de Administradores</h2>
            
                <div class="input-group">
                    <label for="email">Informe o e-mail para o administrador</label>
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
                ?>     
                <input type="submit" class="btn" value="Cadastrar administrador">
        
            </form>
        </div>
    </div>
</body>
</html>