<?php
    include "autentica.php"; 
    if($tipo != "administrador"){
        header('location:error.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <title>Administracao</title>
    
</head>
<body>
        <nav>
            <a class="logo" href=""><img id="logo-nav" src="img/logo.png" alt=""></a>
            <ul class="nav-list">
                <h1>Administração</h1>
            </ul>
            <a href="#botao-confirma" class="btn-nav" onclick="javascript:document.getElementById('botao-confirma').style.visibility = 'visible';">logout</a> 
        </nav><br><br>

        <section id="gallery">
            <div id="gallery-container">
                
                <div id='gallery-content' class="icons-box" href="">
                    <center>
                        <span class=icon2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10vh" height="10vh" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </span><br>
                            <a href="cadastrofun.php" >Cadastrar funcionários</a>
                    </center>
                </div>
                
                <div id='gallery-content' class="icons-box" href="">
                    <center>
                        <span class=icon2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10vh" height="10vh" fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                                <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z"/>
                            </svg>
                        </span><br>
                            <a href="listafun.php" >Funcionários</a>
                    </center>
                </div>
                
                <div id='gallery-content' class="icons-box" href="">
                    <center>
                        <span class=icon2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10vh" height="10vh" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                            </svg>
                        </span><br>
                        <a href="listacli.php">Clientes</a>
                    </center>
                </div>
                
                <div id='gallery-content' class="icons-box" href="">
                    <center>
                        <span class=icon2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10vh" height="10vh" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                        </span><br>
                        <a href="agendamentos.php">Agendamentos</a>
                    </center>
                </div>
                
                <div id='gallery-content' class="icons-box" href="">
                    <center>
                        <span class=icon2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10vh" height="10vh" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </span><br>
                        <a href="cadastroadm.php">Criar novo administrador</a>
                    </center>
                </div>
                
                <div id='gallery-content' class="icons-box" href="">
                    <center>
                        <span class=icon2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10vh" height="10vh" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                                <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                                <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </span><br>
                        <a href="cadastroservico.php">Cadastrar novo serviço</a>
                    </center>   
                </div>
                
                <div id='gallery-content' class="icons-box" href="">
                    <center>
                        <span class=icon2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10vh" height="10vh" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                            </svg>
                        </span><br>
                        <a href="horarios.php">Disponiblizar horário</a><br>
                    </center>
                </div>

            </div>
        </section>
        
    
    <center>
    <div id="botao-confirma" class="confirma">
        <div class="confirma-conteudo">
            <h1>Tem certeza que encerrar sua sessão?</h1><br>
            <a href="logout.php" class="btn1">SIM</a>
            <a href="" class="btn-cancelar" onclick="javascript:document.getElementById('botao-confirma').style.visibility = 'hidden';">Cancelar</a>

        </div>
    </div>
    </center>
</body>
</html>
