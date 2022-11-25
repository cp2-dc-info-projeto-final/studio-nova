<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <title>Alterar senha</title>
</head>
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
            <form action="alterar_senha.php" method="POST">
            <input type="hidden" name="operacao" value="logar">    
            <center>
            <h2>Recuperação de senha</h2>
            </center>

            <div class="input-group">
            <label for="email">Insira seu email</label>
                <input type="email" name="email" placeholder=" Digite aqui seu e-mail" required>
            </div>
            <div class="input-group w50">
            <label for="senha">Insira sua nova senha</label>
                <input type="password" name="senha" placeholder=" Digite aqui sua senha" required>
            </div>
            <div class="input-group w50">
            <label for="senha2">Confirme a senha</label>
                <input type="password" name="senha2" placeholder=" Digite aqui sua senha" required>
            </div>

            <input type="submit" class="btn" value="Mudar a senha">

        </form>
    
    <?php
        include "conecta.php";
        
        if(isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["senha2"])){
        
            $email = ($_POST["email"]);
            $senha1 = ($_POST["senha"]);
            $senha2 = ($_POST["senha2"]);
            $erro = 0;

            $sql_code = "SELECT * FROM  recupera_senha WHERE email = '$email'";
            $sql_query = $mysqli->query($sql_code) or die ("Falha na execusão do código:" . $mysqli->error);

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1 ){

            $sql_code = "SELECT * FROM  recupera_senha WHERE rash ";
            $sql_query = $mysqli->query($sql_code) or die ("Falha na execusão do código:" . $mysqli->error);
            $rash = mysqli_fetch_array($sql_query);
                
                    if($rash != 0){
                        
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
                            if($erro == 0){

                                $id = $rash["id"];

                                $senha_cript = password_hash($senha2 , PASSWORD_DEFAULT);
                                $sql = "UPDATE usuario SET senha = '$senha_cript';";  
                                mysqli_query($mysqli,$sql);
                                
                                $sql = "DELETE FROM recupera_senha WHERE rash = '$id';"; 
                                mysqli_query($mysqli,$sql);

                                echo "<p>Senha atualizada com sucesso!</p>";
                                echo "<a href='login.php'>Fazer login</a>";
                            }
                    }
                    else{
                        echo "<p>Você não pediu a alterção de senha</p>";
                        echo "<p>Clique em esque minha senha na página de login</p>";
                        echo "<a href='login.php'>login</a>";
                        
                    }
            }
            else {
                echo "Email não cadastrado, faça o cadastro na página de cadastro para acessar o site";
                echo "<a href='cadastro.php'>Cadastro</a>";
            }


        }
    ?>
    </div>
</body>
</html>