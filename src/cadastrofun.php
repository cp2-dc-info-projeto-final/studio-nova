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
            <form action="cadastrar_funcionarios.php" method="POST">
            
                <h2>Cadastro de funcionários</h2>
            
                <div class="input-group">
                    <label for="nome">Nome completo</label>
                    <input type="text" name="nome" placeholder=" Digite aqui o nome completo do funcionário" required>
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
        
            </form>
        </div>
    </div>
</body>

</html>

</html>

