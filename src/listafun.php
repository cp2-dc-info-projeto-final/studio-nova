<?php
include "autentica.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <title>Funcionários</title>
</head>
<body>

        <nav>
            <a href="administracao.php"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </a>
            <a class="logo" href="administracao.php"><img id="logo-nav" src="img/logo.png" alt=""></a>
            <ul class="nav-list">
                <h1>Lista de funcionários</h1>        
            </ul>
        </nav>
        <center>
        <div>
        
            <?php
            include ("conecta.php");

                $sql = "SELECT * FROM funcionario;"; 
                $res = mysqli_query($mysqli,$sql);
                $linhas = mysqli_num_rows($res);
                
                for($i = 0; $i < $linhas; $i++)
                 {
                    $funcionario = mysqli_fetch_array($res);
                    echo "<p>Funcionário: ".$funcionario["nome"]."</p>";
                    echo "<p>E-mail: ".$funcionario["email"]."</p>";
                    $id_funcionario= $funcionario["id_funcionario"];
                    echo "<p>CPF: ".$funcionario["cpf"]."</p>";
                    echo "<p>Celular: ".$funcionario["tel"]."</p>";
                    echo "<p><a href='edit.php?id_funcionario=".$funcionario["id_funcionario"]."'>
                    Editar funcionario</a></p>";
                    echo "<p><a href='#botao-confirma?$id_funcionario'> Excluir funcionario</a></p>";
                    
                    echo "<div class='confirma' id='botao-confirma?$id_funcionario'>
                      <div class= 'confirma-conteudo'>
                     <h1>Tem certeza que deseja excluir usuário?</h1><br>
                      <a href= '' class='btn-cancelar'>Cancelar</a>
                      <a href= 'excluir.php?$id_funcionario' class='btn-cancelar'>excluir</a>
                      </di></div>";
                }
            
            ?>
           
        </div>
        </center>
</body>
</html>
