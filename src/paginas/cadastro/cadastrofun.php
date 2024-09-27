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
            <a href="administracao.php"><img id="img1" src="img/logo.png" alt="" class="img1"></a>
        </div>
        <div class="form-box">
            <form action="cadastrofun.php" method="POST">
            
                <h2>Cadastro de funcionários</h2>
            
                <div class="input-group w50">
                    <label for="nome">Primeiro Nome</label>
                    <input type="text" name="nome" placeholder=" Digite aqui o nome" required>
                </div>

                <div class="input-group w50">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" name="sobrenome" placeholder=" Digite aqui o sobrenome" required>
                </div>

                <div class="input-group">
                    <div id="box2">
                        <label for="servicos">Selecione o serviço</label>
                        <select name="servicos">
                        <?php
                        include("conecta.php");

                        $sql = "SELECT * FROM servicos;"; 
                        $res = mysqli_query($mysqli,$sql);
                        $linhas = mysqli_num_rows($res);
                        
                        for($i = 0; $i < $linhas; $i++)
                        {
                            $servicos = mysqli_fetch_array($res);
                            $nome = $servicos["nome"];
                            echo "<option value='$nome'>".$nome."</option>";
                        }
                        ?>

                        </select>
                    </div>
                </div>
               
                <div class="input-group">
                    <label for="email">Informe o e-mail do funcionário</label>
                    <input type="text" name="email" placeholder=" Digite aqui seu email" title="formato" pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                </div>
                <div class="input-group">
                    <label for="cpf">Insira o CPF do funcionário</label>
                    <input type="text" name="cpf" placeholder=" Digite aqui o cpf do funcionário sem linhas e traços" title="formato" required>
                </div>
                <div class="input-group">
                    <label for="tel">Insira o celular do funcionário</label>
                    <input type="text" name="tel" placeholder=" Digite aqui o cpf do funcionário sem linhas e traços" title="formato" required>
                </div>
                <div class="input-group w50">
                    <label for="senha1">Crie sua senha</label>
                    <input type="password" name="senha1" placeholder=" Crie sua senha" maxlength="14" required>
                </div>
                <div class="input-group w50">
                    <label for="senha2">Confirme sua senha</label>    
                    <input type="password" name="senha2" placeholder=" Confirme sua senha" maxlength="14" required>
                </div>
            
                <input type="submit" class="btn" value="Cadastrar funcionário">
                    <?php
                        session_start();
                        include("conecta.php");
                        
                        if(isset($_POST["nome"]) && isset($_POST["sobrenome"]) && isset($_POST["email"]) && isset($_POST["senha1"]) && isset($_POST["senha2"]) && isset($_POST["tel"]) && isset($_POST["cpf"]) && isset($_POST["servicos"])){ 
                        
                        $servico = $_POST ["servicos"];
                        $nome = $_POST ["nome"];
                        $sobrenome = $_POST["sobrenome"];
                        $email = $_POST ["email"];
                        $senha1 = $_POST ["senha1"];
                        $senha2 = $_POST ["senha2"];
                        $tel = $_POST["tel"];
                        $cpf = $_POST["cpf"];
                        $erro = 0;

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
                            $senha_cript = password_hash($senha2 , PASSWORD_DEFAULT);
                            $mysqli = mysqli_connect("localhost","nova","admin","novastudio");
                            $sql = "INSERT INTO funcionario (nome,email,senha,cpf,tel,servico)";
                            $sql .= "VALUES ('$nome','$email','$senha_cript','$cpf','$tel','$servico');";  
                            mysqli_query($mysqli,$sql);
                            mysqli_close($mysqli);

                            echo "Funcionário cadastrado com sucesso!<br>";
                        }
                    }
    
                ?>
            </form>
        </div>
    </div>
</body>

</html>

</html>

