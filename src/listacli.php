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
<<<<<<< HEAD
                            
            <div class="box-search">
                <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
                <button onclick="searchData()" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>

=======
            <form action="pagina_extra.php" method="POST">
            <input type="hidden" name="operacao" value="buscar">
            <input type="search" name="nome" size="10" value="Pesquisar">
            <input type="submit" value="Buscar">
        </form>
>>>>>>> 8e61dd96581d0717e6725239f7179e2fa11ad5d3
        </nav>
        <main>
        
        <div id="id01" class="w3-modal" style="visibility: hidden">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <p>Deseja escluir esse usuário?</p>
                        <input type="submit" value="sim">
                </div>
            </div>
        </div>
</div>
            <?php
            include ("conecta.php");

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
<<<<<<< HEAD
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'listacli.php?search='+search.value;
    }
</script>
</html>
=======
</html>
>>>>>>> 8e61dd96581d0717e6725239f7179e2fa11ad5d3
