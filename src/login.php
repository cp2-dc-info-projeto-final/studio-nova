<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <title>Login</title>
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

            <h2>Login</h2>
            
            <p>Ainda não possui conta ?</p>
            <a href="cadastro.php">Clique aqui</a>

            <div class="input-group">
            <label for="email">Insira seu email</label>
                <input type="email" name="email" placeholder=" Digite aqui seu e-mail" required>
            </div>
            <div class="input-group">
            <label for="email">Insira sua senha</label>
                <input type="email" name="email" placeholder=" Digite aqui sua senha" required>
            </div>

            <input type="submit" class="btn" value="Entrar">

        </form>
    </div>
</div>
    
</body>
</html>
