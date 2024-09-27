<?php
    include "autentica.php";
    if($tipo == "cliente"){
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
    <title>Área do Funcionário</title>
</head>
<body>
    
<nav>
                <a  href="#mySidenav" onclick="openNav()">     
                <svg id="sidebar-btn" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
                </a> 
            </label>
            <a class="logo" href=""><img id="logo-nav" src="img/logo.png" alt=""></a>
            <a href="#botao-confirma">Sair</a>
    </nav>
    <!-- menu lateral --> 
    <div class="sidebar" id="mySidenav">
        <center>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <h2><?php echo $_SESSION ['bemvindo']; ?></h2>
            <h2><?php echo $_SESSION ['nome']; ?></h2>
        </center>
        <a href="">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </span>
                    <span class="title">Início</span> 
                </a>
                <a href="editusu.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                    </span>
                    <span class="title">Meus dados</span> 
                </a>
                <a href="#botao-confirma">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>
                    </span>
                    <span class="title">Sair</span> 
                </a>

    </div>
    <div id="botao-confirma" class="confirma">
        <div class="confirma-conteudo">
            <h1>Tem certeza que encerrar sua sessão?</h1><br>
            <a href="logout.php" class="btn1">SIM</a>
            <a href="" class="btn-cancelar">Cancelar</a>
        </div>
    </div>
    <center>
    <div>
        <h1><?php echo $_SESSION ['servico']; ?></h1>
        <?php
            include 'conecta.php';
            $sql = "SELECT * FROM agendamento;";
            $res = mysqli_query($mysqli,$sql);
            $trabalho = mysqli_fetch_array($res);

            if($trabalho == 0){
                echo"<p>Você não possui nenhum trabalho pendente</p>";
            }
        ?>
    </div>
    </center>
    <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</body>
</html>