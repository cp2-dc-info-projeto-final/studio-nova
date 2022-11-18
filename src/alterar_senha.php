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
            <form action="login.php" method="POST">
            <input type="hidden" name="operacao" value="logar">    
            <center>
            <h2>Recuperação de senha</h2>
            </center>

            <div class="input-group">
            <label for="email">Insira seu email</label>
                <input type="email" name="email" placeholder=" Digite aqui seu e-mail" required>
            </div>
            <div class="input-group w50">
            <label for="email">Insira sua nova senha</label>
                <input type="password" name="senha" placeholder=" Digite aqui sua senha" required>
            </div>
            <div class="input-group w50">
            <label for="email">Confirme a senha</label>
                <input type="password" name="senha" placeholder=" Digite aqui sua senha" required>
            </div>

            <input type="submit" class="btn" value="Mudar a senha">

        </form>
    </div>
</html>