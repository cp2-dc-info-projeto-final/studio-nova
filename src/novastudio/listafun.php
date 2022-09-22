<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <title>Lista de clientes</title>
</head>
<body>
        <nav>
            <a class="logo" href="administracao.php"><img src="img/logo.png" alt=""></a>
            <ul class="nav-list">
                <h1>Lista de clientes</h1>        
            </ul>
        </nav>
        <main>
            <?php
            include ("conecta.php");

                $sql = "SELECT * FROM funcionario;"; 
                $res = mysqli_query($mysqli,$sql);
                $linhas = mysqli_num_rows($res);
                
                for($i = 0; $i < $linhas; $i++)
                {
                    $funcionario = mysqli_fetch_array($res);
                    echo "<p>Nome: ".$funcionario["nome"]."</p>";
                    echo "<p>E-mail: ".$funcionario["email"]."</p>";
                    echo "<p><a href='edit.php?id=".$funcionario["id"]."'>
                    Editar cliente</a></p>";
                
                }
            
            ?>
        </main>
</body>
</html>