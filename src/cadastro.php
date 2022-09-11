<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <title>cadastro</title>
</head>
<body>
    <div class="box">
        <div class="img-box">
            <img src="img/logo.png" alt="" class="img1">
        </div>
    <div class="form-box">
        <form action="cadastrar.php" method="">
            
            <h2>Crie sua conta</h2>
            
            <p>É necessário estar cadastrado para fazer o agendamento</p>
            
            <p>Já possui conta ?</p>
            <a href="login.php">Clique aqui</a>
            <div class="input-group">
                <label for="nome">Nome completo</label>
                <input type="text" name="nome" placeholder=" Digite aqui seu nome completo">
            </div>
            <div class="input-group">
                <label for="email">Informe seu e-mail</label>
                <input type="text" name="email" placeholder=" Digite aqui seu email">
            </div>
            <div class="input-group w50">
                <label for="senha1">Crie sua senha</label>
                <input type="password" name="senha1" placeholder=" Crie sua senha">
            </div>
            <div class="input-group w50">
                <label for="senha2">Confirme sua senha</label>    
                <input type="password" name="senha2" placeholder=" Confirme sua senha">
            </div>
                
                <input type="submit" class="btn" value="Cadastrar-se">
        </form>
    </div>
    </div>

</body>
</html>
