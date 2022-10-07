
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

            <form action="listacli.php" method="POST">
                <input type="hidden" name="operacao" value="buscar">
                    <p>Nome: <input type="text" name="nome" size="10"></p>
                    <p><input type="submit" value="Buscar"></p>
            </form>
        </nav>
       <main>
      

        
        <div id="id01" class="w3-modal" style="visibility: hidden">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <p>Deseja excluir esse usuário?</p>
                        <input type="submit" value="sim">
                </div>
            </div>
        </div>
</div>
            <?php
            include ("conecta.php");

            if(isset($_POST["nome"])) {
                $nome = $_POST["nome"];
                $sql = "SELECT * FROM cliente WHERE nome like '%$nome%';"; 
                $res = mysqli_query($mysqli,$sql);
                $linhas = mysqli_num_rows($res);
            
                for($i = 0; $i < $linhas; $i++){
                $cliente = mysqli_fetch_array($res);
                echo "Nome: ".$cliente["nome"]."<br>";
                echo "E-mail: ".$cliente["email"]."<br>";
               
            }
        }
           
                $sql = "SELECT * FROM usuario;"; 
                $res = mysqli_query($mysqli,$sql);
                $linhas = mysqli_num_rows($res);
       
                for($i = 0; $i < $linhas; $i++)
                {
                    $cliente = mysqli_fetch_array($res);
                    echo "<p>Nome: ".$cliente["nome"]."</p>";
                    echo "<p>E-mail: ".$cliente["email"]."</p>";
                    echo "<p><a href='edit.php?id=".$cliente["id"]."'>
                    Editar cliente</a></p>";
                    echo "<p><a onclick='document.getElementById('id01').style.display='block'' href='excluir.php?id=".$cliente["id"]."'>
                    Excluir cliente</a></p>";
                
                }
            
            ?>
        </main>
</body>
</html>

</html>
