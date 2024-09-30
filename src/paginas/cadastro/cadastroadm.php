<?php
include "../actions/autentica.php"; 
if($tipo != "administrador"){
    header('location:../error.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/nova.css">
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
            <form action="cadastrar.php" method="POST">
            
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
                <input type="hidden" name="action" value="cadastrarAdm">
                <input type="submit" class="btn" value="Cadastrar administrador">
        
            </form>
        </div>
    </div>
</body>
</html>