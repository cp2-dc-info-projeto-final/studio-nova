<?php
    include "../actions/autentica.php";
    include "../actions/conecta.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/nova.css">
    <title>Página inicial</title>
</head>
<body>
     <!--<div id="loading" class="box-load">
        <div class="pre"><img src="img/loading.gif" alt=""></div>
    </div>
-->
    
<div class="conteudo">
    <!-- barra de navegação --> 
    <nav>
                <a  href="#mySidenav" onclick="openNav()">     
                <svg id="sidebar-btn" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
                </a> 
            <a class="logo" href=""><img id="logo-nav" src="img/logo.png" alt=""></a>
            <a href="#botao-confirma" onclick="javascript:document.getElementById('botao-confirma').style.visibility = 'visible'" class="sair">Sair</a>
    </nav>
    <!-- menu lateral --> 
    <div class="sidebar" id="mySidenav">
        <center>
            <a href="javascript:void(0)" class="close-sidebar" onclick="closeNav()">&times;</a>
            <h2><?php echo $_SESSION ['bemvindo']; ?></h2>
            <h2><?php echo $_SESSION ['nome']; ?></h2>
        </center>
        <a href="" onclick="closeNav()">
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
                    <span class="title">Meu perfil</span> 
                </a>
                <a href="../agendamentos.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                            <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                        </svg>
                    </span>
                    <span class="title">Meus agendamentos</span> 
                </a>
                <a href="#botao-confirma" onclick="javascript:document.getElementById('botao-confirma').style.visibility = 'visible'">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>
                    </span>
                    <span class="title">Sair</span> 
                </a>

    </div>

<!-- Caixa de confirmação -->    
        <center>
                <div id="botao-confirma" class="confirma">
                    <div class="confirma-conteudo">
                        <h1>Tem certeza que encerrar sua sessão?</h1><br>
                        <a href="logout.php" class="btn1">SIM</a>
                        <a class="btn-cancelar" onclick="javascript:document.getElementById('botao-confirma').style.visibility = 'hidden'">Cancelar</a>
                    </div>
                </div>
                <div class="conteudo-editar">       
                    <h1>Nossos serviços :</h1>
                </div> 
        </center>
        <section id="gallery">
            <div id="gallery-container">
        <?php
                $sql = "SELECT * FROM servicos;"; 
                $res = mysqli_query($mysqli,$sql);
                $linhas = mysqli_num_rows($res);
   
                for($i = 0; $i < $linhas; $i++)
                {
                    $servico = mysqli_fetch_array($res);
                    $id = $servico["id"];
                    $nome = $servico["nome"];
                    echo"<div id='gallery-content'>";
                    echo"<center>";
                    echo "  <p>".$nome."</p>";
                    echo "  <p>R$".$servico["preco"].",00</p>";
                    echo "  <p><a href='#horarios?$id' onclick=\"javascript:document.getElementById('horarios?$id').style.visibility = 'visible';\" >Ver horários</a></p>";
                    echo"</center>";
                    echo"</div>";
                    
                    echo "<div id='horarios?$id' class= 'confirma'>
                            <div class='confirma-conteudo-agendamento'>
                            <center>
                                <a href=\"javascript:void(0)\" class='close' onclick=\"javascript:document.getElementById('horarios?$id').style.visibility = 'hidden';\">&times;</a>
                                <h1>Horários de $nome </h1><br>";

                                        $sql2 = "SELECT * FROM agendamento WHERE nome_servico = '$nome' AND  id_usuario IS NULL;";
                                        $res2 = mysqli_query($mysqli,$sql2);
                                        $quantidade = mysqli_num_rows($res2);


                                                    if($quantidade != 0){

                                                        for($j = 0; $j < $quantidade; $j++){
                                                        
                                                        $data = mysqli_fetch_array($res2);
                                                        $dia_servico = $data["dataServico"];
                                                        $hora = $data["horario"];
                                                        $id_agendamento = $data["id"];
                                                        $id = $_SESSION["id"];
                                                        echo "<p> Dia: $dia_servico às $hora<br>
                                                        <a onClick=\"javascript:confirm('Gostaria de agendar este serviço?')\" href='finalizar-agendamento.php?id_agendamento=$id_agendamento&id_usuario=$id'>Agendar Serviço</a></p><br>";
                                                        
                                                }
                                                }
                                                else{
                                                    echo"Nenhum horário disponível no momento";
                                                }
                                        
                    echo"</center> 
                        </div>
                    </div>";
                }

                
               
                
        ?>
        
    </div>
    </div>
</body> 
<!-- 

<script>
    var i = setInterval(function () {
    
    clearInterval(i);
  
    document.getElementById("loading").style.display = "none";

}, 4000);
--> 
<script>
function openNav() {
  document.getElementById("mySidenav").style.visibility = "visible";
}
function closeNav() {
  document.getElementById("mySidenav").style.visibility = "hidden";
}

</script>
</html>