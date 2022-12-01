<?php
include "autentica.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
        <nav>
            <a class="logo" href="administracao.php"><img id="logo-nav" src="img/logo.png" alt=""></a>
            <ul class="nav-list">
                <h1>Clientes</h1>        
            </ul>
            <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
        </nav>
  
<center>
    <div>
  <?php
    include "conecta.php";
    
    
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM usuario WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
        $result = $mysqli->query($sql);
        if (!$result) {
            printf("Errormessage: %s\n", $mysqli->error);
        }
        else
        {
            $sql = "SELECT * FROM usuario ORDER BY id DESC";
   
        }
        $linhas = mysqli_num_rows($result);
        for($i = 0; $i < $linhas; $i++){
            $cliente = mysqli_fetch_array($result);
            echo "Nome: ".$cliente["nome"]."<br>";
            echo "E-mail: ".$cliente["email"]."<br>";
        }
        if($linhas == 0)
                {
                    echo '<script type ="text/JavaScript">';  
                    echo 'alert("Nenhum resultado foi encontrado")';  
                    echo '</script>';
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
                    echo "<p><a href='excluir.php?id=".$cliente["id"]."'> Excluir cliente</a></p><br>";
                
                }

?>
  
    </div>
    </center>
</body>
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
        window.location = 'busca.php?search='+search.value;
    }
</script>
</html>