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
    <title>Agendamentos</title>
</head>
<body>
    <?php

        include "conecta.php";

        if($tipo == "administrador"){
        echo"<nav>
            <a href='administracao.php'><svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-arrow-left' viewBox='0 0 16 16'>
                <path fill-rule='evenodd' d='M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z'/>
                </svg>
            </a>
            <a class='logo' href='administracao.php'><img id='logo-nav' src='img/logo.png' alt=''></a>
            <ul class='nav-list'>
                <h1>Todos os agendamentos</h1>        
            </ul>
        </nav>";}

        elseif($tipo == "cliente"){
        echo"<nav>
            <a href='paginainicial.php'><svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-arrow-left' viewBox='0 0 16 16'>
                <path fill-rule='evenodd' d='M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z'/>
                </svg>
            </a>
            <a class='logo' href='paginainicial.php'><img id='logo-nav' src='img/logo.png' alt=''></a>
            <ul class='nav-list'>
                <h1>Seus agendamentos</h1>        
            </ul>
        </nav>
        ";
            
        $id = $_SESSION['id'];

            $sql = "SELECT * FROM agendamento WHERE id_usuario = '$id';";
            $res = mysqli_query($mysqli,$sql); 
            $quantidade = mysqli_num_rows($res);
            if($quantidade != 0){
                echo"<h1>Você agendou:</h1>";
                for($i = 0; $i < $quantidade; $i++)
                    {
                        $agendamento = mysqli_fetch_array($res);
                        echo"";
                        echo "<p>Serviço: ".$agendamento["nome_servico"]."</p>";
                        echo "<p>Data: ".$agendamento["dataServico"]. " às ".$agendamento["horario"]."</p><br>";
                    }
                }
                else{
                    echo"<h1>Você ainda não fez nenhum agendamento</h1>";
                }
    }

        elseif($tipo == "funcionario"){
            echo"<nav>
                <a href='funcionarios.php'><svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-arrow-left' viewBox='0 0 16 16'>
                    <path fill-rule='evenodd' d='M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z'/>
                    </svg>
                </a>
                <a class='logo' href='funcionarios.php'><img id='logo-nav' src='img/logo.png' alt=''></a>
                <ul class='nav-list'>
                    <h1>Seus agendamentos</h1>        
                </ul>
            </nav>";}
        ?>
</body>
</html>