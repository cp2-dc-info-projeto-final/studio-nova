
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
            <form action="cadastrar.php" method="POST">
            
                <h2>Crie sua conta</h2>
            
                <p>É necessário estar cadastrado para fazer o agendamento</p>
            
                <p>Já possui conta ?</p>
                <a href="login.php">Clique aqui</a>
                
                <div class="input-group">
                    <label for="nome">Nome completo</label>
                    <input type="text" name="nome" placeholder=" Digite aqui seu nome completo" pattern="[a-zA-Z]+$" required>
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
            
                <input type="submit" class="btn" value="Cadastrar-se">
        
            </form>
        </div>
    </div>
</body>
</html>
