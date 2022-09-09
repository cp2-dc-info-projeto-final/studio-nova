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
    <h1>Crie sua conta</h1>
    <p>(É necessário estar cadastrado para fazer o agendamento)</p>
    
    <form action="cadastrar.php" method="">
        
            <p>Insira seu nome completo</p>
                
                <input type="text" name="nome">
            
            <p>Insira seu email</p>

                <input type="text" name="email">

            <p>Crie uma senha</p>

                <input type="password" name="senha1">
            
            <p>Repita sua senha</p>    
    
                <input type="password" name="senha2">
                <input type="submit">
    </form>

    <p>Já possui conta ?</p>
    <a href="login.php">Clique aqui</a>
</body>
</html>

