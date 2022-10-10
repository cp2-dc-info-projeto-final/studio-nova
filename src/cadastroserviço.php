<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <title>Cadastro de serviços</title>
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
<main>

   </main>
    <div class="box">
        <div class="img-box">
            <a href="administracao.php"><img src="img/logo.png" alt="" class="img1"></a>
        </div>
        <div class="form-box">
            <form action="cadastroadm.php" method="POST">
            
                <h2>Cadastro de serviços </h2>
            
                <div class="input-group">
                    <label for="nome">Informe o nome do serviço</label>
                    <input type="text" name="nome" placeholder=" Digite aqui seu email" title="formato" required>
                </div>
                <div class="input-group">
                    <label for="preco">Informe o preço do serviço</label>
                    <input type="text" name="preco" placeholder=" Digite aqui seu email" title="formato" required>
                </div>
                
                
            
                <?php
    
                    session_start();
                    include_once("conecta.php");

                        if(isset($_POST["email"]) || isset($_POST["senha1"]) || isset($_POST["senha2"]) ) 
                        {
                                $nome = $_POST ["nome"];
                                $preco = $_POST ["preco"];
                                $erro = 0;

                        
                                $mysqli = mysqli_connect("localhost","nova","admin","novastudio");
                                $sql = "INSERT INTO servico (nome,preco)";
                                $sql .= "VALUES ('$nome','$preco');";  
                                mysqli_query($mysqli,$sql);
                                mysqli_close($mysqli);

                                echo "serviço cadastrado com sucesso!<br>";
                    }
                ?>     
                <input type="submit" class="btn" value="Cadastrar serviço">
        
            </form>
        </div>
  
</body>
</html>