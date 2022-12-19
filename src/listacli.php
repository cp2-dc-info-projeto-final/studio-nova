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
            <a href="administracao.php"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </a>
            <a class="logo" href="administracao.php"><img id="logo-nav" src="img/logo.png" alt=""></a>
            <ul class="nav-list">
                <h1>Lista de clientes</h1>        
            </ul>
            <div class="box-search">
                <input type="search" class="barra-pesquisa" placeholder="Pesquisar" id="pesquisar">
                <button onclick="searchData()" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </nav>
  
        <center>
            <div class="table">
                <div class="table-header">
                    <div class="header__item"><a id="nome" class="filter__link" href="#">Nome</a></div>
                    <div class="header__item"><a id="sobrenome" class="filter__link filter__link--number" href="#">Sobrenome</a></div>
                    <div class="header__item"><a id="email" class="filter__link filter__link--number" href="#">Email</a></div>
                    <div class="header__item"><a id="acoes" class="filter__link filter__link--number" href="#">Ações</a></div>
                </div> 
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
                                $id = $cliente['id'];
                                $nome = $cliente["nome"];
                                echo"<div class='table-content'>
                                        <div class='table-row'>";
                                    echo "<div class='table-data'>$nome</div>";
                                    echo "<div class='table-data'>".$cliente["sobrenome"]."</div>";
                                    echo "<div class='table-data'>".$cliente["email"]."</div>";
                                    echo "<div class='table-data'>
                                        <a href='#botao-confirma-editar?$id' onclick=\"javascript:document.getElementById('botao-confirma-editar?$id').style.visibility = 'visible';\"> 
                                            <svg xmlns='http://www.w3.org/2000/svg' width='3.5vh' height='3.5vh' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                            </svg>
                                        </a>";
                                    echo "<a href='#botao-confirma-excluir?$id' onclick=\"javascript:document.getElementById('botao-confirma-excluir?$id').style.visibility = 'visible';\">
                                            <svg xmlns='http://www.w3.org/2000/svg' width='3.5vh' height='3.5vh' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                                <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                            </svg>
                                        </a>";
                                    echo"</div>";
                                echo"</div>";
                            echo"</div>";

                            echo "<div class='confirma' id='botao-confirma-excluir?$id'>
                            <div class= 'confirma-conteudo'>
                                <h1>Tem certeza que deseja excluir $nome?</h1><br>
                                <a href= 'excluir.php?id='$id' class='btn'>excluir</a>
                                <a href= '' class='btn-cancelar' onclick=\"javascript:document.getElementById('botao-confirma-excluir?$id').style.visibility = 'hidden';\">Cancelar</a>
                            </div>
                        </div>";

                        echo "<div class='confirma' id='botao-confirma-editar?$id'>
                                <div class= 'confirma-conteudo'>
                                    <h1>Tem certeza que deseja editar $nome?</h1><br>
                                    <a href= 'edit.php?id=$id' class='btn'>Editar</a>
                                    <a href= '' class='btn-cancelar' onclick=\"javascript:document.getElementById('botao-confirma-editar?$id').style.visibility = 'hidden';\">Cancelar</a>
                                </div>
                            </div>";

                    }
                    if($linhas == 0)
                            {
                                echo "<div class='table-data'>
                                        <p>Nenhum resultado foi encontrado</p>
                                        <p><a href=listacli.php>Voltar</a></p>
                                     </div>";  
                            }
                
                        
                }
                else{
                            $sql = "SELECT * FROM usuario;"; 
                            $res = mysqli_query($mysqli,$sql);
                            $linhas = mysqli_num_rows($res);
                
                            for($i = 0; $i < $linhas; $i++)
                            {
                                $cliente = mysqli_fetch_array($res);
                                $id = $cliente['id'];
                                $nome = $cliente["nome"];
                                echo"<div class='table-content'>
                                        <div class='table-row'>";
                                    echo "<div class='table-data'>$nome</div>";
                                    echo "<div class='table-data'>".$cliente["sobrenome"]."</div>";
                                    echo "<div class='table-data'>".$cliente["email"]."</div>";
                                    echo "<div class='table-data'>
                                        <a href='#botao-confirma-editar?$id' onclick=\"javascript:document.getElementById('botao-confirma-editar?$id').style.visibility = 'visible';\"> 
                                            <svg xmlns='http://www.w3.org/2000/svg' width='3.5vh' height='3.5vh' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                            </svg>
                                        </a>";
                                    echo "<a href='#botao-confirma-excluir?$id' onclick=\"javascript:document.getElementById('botao-confirma-excluir?$id').style.visibility = 'visible';\">
                                            <svg xmlns='http://www.w3.org/2000/svg' width='3.5vh' height='3.5vh' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                                <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                            </svg>
                                        </a>";
                                    echo"</div>";
                                echo"</div>";
                            echo"</div>";


                                echo "<div class='confirma' id='botao-confirma-excluir?$id'>
                                        <div class= 'confirma-conteudo'>
                                            <h1>Tem certeza que deseja excluir $nome?</h1><br>
                                            <a href= 'excluir.php?id_cliente=$id' class='btn'>excluir</a>
                                            <a href= '' class='btn-cancelar' onclick=\"javascript:document.getElementById('botao-confirma-excluir?$id').style.visibility = 'hidden';\">Cancelar</a>
                                        </div>
                                    </div>";

                                    echo "<div class='confirma' id='botao-confirma-editar?$id'>
                                            <div class= 'confirma-conteudo'>
                                                <h1>Tem certeza que deseja editar $nome?</h1><br>
                                                <a href= 'editusu.php?id_cliente=$id' class='btn'>Editar</a>
                                                <a href= '' class='btn-cancelar' onclick=\"javascript:document.getElementById('botao-confirma-editar?$id').style.visibility = 'hidden';\">Cancelar</a>
                                            </div>
                                        </div>";
                            }
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
        window.location = 'listacli.php?search='+search.value;
    }
</script>
</html>