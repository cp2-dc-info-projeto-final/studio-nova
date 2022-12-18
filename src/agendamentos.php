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
        </nav>";
    
        $sql = "SELECT * FROM agendamento";
        $res = mysqli_query($mysqli,$sql); 
        $quantidade = mysqli_num_rows($res);
        if($quantidade != 0){
            echo"<h1>Todos agendamentos:</h1>";
            for($i = 0; $i < $quantidade; $i++)
                {
                    $agendamento = mysqli_fetch_array($res);
                    $id_cliente = $agendamento['id_usuario'];

                    $sql = "SELECT * FROM usuario WHERE id = '$id_cliente';";
                    $res2 = mysqli_query($mysqli,$sql);
                    $cliente = mysqli_fetch_array($res2);
                    $cliente_nome = $cliente["nome"];

                    echo "<p>Serviço: ".$agendamento["nome_servico"]."</p>";
                    echo "<p>Data: ".$agendamento["dataServico"]. " às ".$agendamento["horario"]."</p><br>";
                    echo"<p>Cliente: $cliente_nome</p>";
                }
            }
        else{
                echo"<h1>Nenhum agendamento foi realizado até agora</h1>";
            }
    
    }

        elseif($tipo == "cliente"){
        echo"<nav>
        <a  href='#mySidenav' onclick=\"javascript:document.getElementById('mySidenav').style.visibility = 'visible';\">     
        <svg id='sidebar-btn' xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor'class='bi bi-list' viewBox='0 0 16 16'>
            <path fill-rule='evenodd' d='M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z'/>
        </svg>
        </a> 
            <a class='logo' href='paginainicial.php'><img id='logo-nav' src='img/logo.png' alt=''></a>
            <ul class='nav-list'>
                <h1>Seus agendamentos</h1>        
            </ul>
        </nav>
        
        <div class='sidebar' id='mySidenav'>
            <a href='javascript:void(0)' class='close-sidebar' onclick=\"javascript:document.getElementById('mySidenav').style.visibility = 'hidden';\" >&times;</a>
        <a href='paginainicial.php'>
                    <span class='icon'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-house' viewBox='0 0 16 16'>
                            <path fill-rule='evenodd' d='M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z'/>
                            <path fill-rule='evenodd' d='M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z'/>
                        </svg>
                    </span>
                    <span class='title'>Início</span> 
                </a>
                <a href='editusu.php'>
                    <span class='icon'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16'>
                            <path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z'/>
                        </svg>
                    </span>
                    <span class='title'>Meu perfil</span> 
                </a>
                <a href=''>
                    <span class='icon'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-folder' viewBox='0 0 16 16'>
                            <path d='M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z'/>
                        </svg>
                    </span>
                    <span class='title'>Meus agendamentos</span> 
                </a>
                <a href='#botao-confirma'>
                    <span class='icon'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-left' viewBox='0 0 16 16'>
                            <path fill-rule='evenodd' d='M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z'/>
                            <path fill-rule='evenodd' d='M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z'/>
                        </svg>
                    </span>
                    <span class='title'>Sair</span> 
                </a>

    </div>";
            
        $id = $_SESSION['id'];

        $sql = "SELECT * FROM agendamento WHERE id_usuario = '$id';";
        $res = mysqli_query($mysqli,$sql); 
        $quantidade = mysqli_num_rows($res);
        if($quantidade != 0){
            echo"<div class='conteudo-editar'>
                    <h1>Você agendou:</h1>
                </div>";

            for($i = 0; $i < $quantidade; $i++)
                {
                    $agendamento = mysqli_fetch_array($res);
                    echo"<div class='conteudo-editar'>
                            <div id='gallery-container'>
                                <div id='gallery-content'>
                                    <p>Serviço: ".$agendamento["nome_servico"]."</p>
                                    <p>Dia: ".$agendamento["dataServico"]. "</p>
                                    <p>Hora: ".$agendamento["horario"]. "</p>
                                </div>
                            </div>
                        </div>";
                }
            }
            else{
                echo"<div class='conteudo-editar'>
                        <h1>Você ainda não fez nenhum agendamento</h1>
                    </div>";
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
                    <h1>Seus serviços</h1>        
                </ul>
            </nav>";
            
            $id = $_SESSION['id'];
            
            $sql = "SELECT * FROM agendamento WHERE id_funcionario = '$id';";
            $res = mysqli_query($mysqli,$sql); 
            $quantidade = mysqli_num_rows($res);
            if($quantidade != 0){
                echo"<h1>Seus serviços:</h1>";
                for($i = 0; $i < $quantidade; $i++)
                    {
                        $agendamento = mysqli_fetch_array($res);
                        $id_funcionario = $agendamento["id_funcionario"];
                        
                        $sql = "SELECT * FROM usuario WHERE id = '$id_funcionario';";
                        $res2 = mysqli_query($mysqli,$sql);
                        $cliente = mysqli_fetch_array($res2);
                        $cliente_nome = $cliente["nome"];

                        echo "<p>Data: ".$agendamento["dataServico"]. " às ".$agendamento["horario"]."</p><br>";
                        echo"<p>Cliente: $cliente_nome</p>";
                    }
                }
                else{
                    echo"<h1>Você não tem nenhum serviço pendente</h1>";
                }
    }
        
        
        ?>
</body>
</html>