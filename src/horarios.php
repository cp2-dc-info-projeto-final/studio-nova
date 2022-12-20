<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <title>Horarios</title>
</head>
<body>
        <nav>
            <a href="administracao.php"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </a>
            <a class="logo" href="administracao.php"><img id="logo-nav" src="img/logo.png" alt=""></a>
            <ul class="nav-list">
                <h1>Disponibilizar horários</h1>        
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
            <div class="header__item"><a id="nome" class="filter__link" href="#">Serviço</a></div>
            <div class="header__item"><a id="sobrenome" class="filter__link filter__link--number" href="#">Preço(R$)</a></div>
            <div class="header__item"><a id="email" class="filter__link filter__link--number" href="#">Duração(min.)</a></div>
            <div class="header__item"><a id="acoes" class="filter__link filter__link--number" href="#">Ações</a></div>
        </div> 
            <?php
            include "conecta.php";

            if(!empty($_GET['search']))
                {
                    $data = $_GET['search'];
                    $sql = "SELECT * FROM servicos WHERE nome LIKE '%$data%' or preco LIKE '%$data%' or duracao LIKE '%$data%' ORDER BY id DESC";
                    $result = $mysqli->query($sql);
                    if (!$result) {
                        printf("Errormessage: %s\n", $mysqli->error);
                    }
                    else
                    {
                        $sql = "SELECT * FROM servicos ORDER BY id DESC";
            
                    }
                    $linhas = mysqli_num_rows($result);
                    for($i = 0; $i < $linhas; $i++){

                        $servicos = mysqli_fetch_array($result);
                            $id = $servicos["id"];
                            $nome = $servicos["nome"];
                            echo"<div class='table-content'>
                                    <div class='table-row'>";
                                echo "<div class='table-data'>". $nome."</div>";
                                echo "<div class='table-data'>". $servicos["preco"]."</div>";
                                echo "<div class='table-data'>". $servicos["duracao"]."</div>";
                                echo "<div class='table-data'>
                                        <a href='#inserirhorarios?$id' onclick=\"document.getElementById('inserirhorarios?$id').style.visibility = 'visible';\">
                                        <svg xmlns='http://www.w3.org/2000/svg' width='3vh' height='3vh' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
                                            <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
                                            <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
                                        </svg><br>Disponibilizar horários
                                        </div>";
                                    echo"</div>";
                                echo"</div>";
                            
                            echo "<div id ='inserirhorarios?$id' class = 'confirma'>
                                        <div class='confirma-conteudo'>
                                            <a href='javascript:void(0)' class='close' onclick=\"document.getElementById('inserirhorarios?$id').style.visibility = 'hidden';\">&times;</a>
                                            <h1> Agendamento de horário </h1><br>
                                            <h2> $nome </h2><br>
                                                    
                                                    
                                            <form action='horarios.php' method='POST'>
                                            <input type='hidden' name='nome' value='$nome'>
                                                <div class='input-group'>
                                                    <label for='data'>Insira o dia</label>
                                                    <input type='date' name='data' placeholder=' Insira aqui o dia do serviço' required>
                                                </div>
                                                <div class='input-group'>
                                                    <label for='horario'>Insira o horario</label>
                                                        <input type='time' name='horario' placeholder=' Insira aqui a hora do serviço' required>
                                                </div>
                                                <div class='input-group'>
                                                        <div id='box2'>
                                                            <label for='funcionarios'>Selecione o funcionario</label>
                                                                <select name='funcionarios'>";

                                                                    $sql2 = "SELECT * FROM funcionario WHERE servico = '$nome';";
                                                                    $res2 = mysqli_query($mysqli,$sql2);
                                                                    $linhas_funcionario = mysqli_num_rows($res2);
                                                                    
                                                                    for($j = 0; $j < $linhas_funcionario; $j++)
                                                                    {
                                                                        $funcionarios = mysqli_fetch_array($res2);
                                                                        $nome_fun = $funcionarios["nome"];
                                                                        $id_fun = $funcionarios["id_funcionario"]; 
                                                                        echo "<option value='$nome_fun'>".$nome_fun."</option>";
                                                                    }

                                                            echo"</select>
                                                        </div>
                                                    </div>
                                                    <input type='hidden' name='id_fun' value='$id_fun'>
                                                    <input type='hidden' name='nome' value='$nome'>
                                                    <input type='submit' class='btn' value='Inserir'>";
                                        echo"</form>
                                        </div>
                                    </div>";

                                }
                            if($linhas == 0)
                            {
                                echo "<div class='table-data'>
                                        <p>Nenhum resultado foi encontrado</p>
                                        <p><a href=listafun.php>Voltar</a></p>
                                     </div>";  
                            }
                }
else{
            $sql = "SELECT * FROM servicos;"; 
            $res = mysqli_query($mysqli,$sql);
            $linhas = mysqli_num_rows($res);

            for($i = 0; $i < $linhas; $i++)
            {
                $servicos = mysqli_fetch_array($res);
                $id = $servicos["id"];
                $nome = $servicos["nome"];
                echo"<div class='table-content'>
                        <div class='table-row'>";
                    echo "<div class='table-data'>". $nome."</div>";
                    echo "<div class='table-data'>". $servicos["preco"]."</div>";
                    echo "<div class='table-data'>". $servicos["duracao"]."</div>";
                    echo "<div class='table-data'>
                            <a href='#inserirhorarios?$id' onclick=\"document.getElementById('inserirhorarios?$id').style.visibility = 'visible';\">
                            <svg xmlns='http://www.w3.org/2000/svg' width='3vh' height='3vh' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
                                <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
                                <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
                            </svg><br>Disponibilizar horários
                            </div>";
                        echo"</div>";
                    echo"</div>";
                
                echo "<div id ='inserirhorarios?$id' class = 'confirma'>
                            <div class='confirma-conteudo'>
                                <a href='javascript:void(0)' class='close' onclick=\"document.getElementById('inserirhorarios?$id').style.visibility = 'hidden';\">&times;</a>
                                <h1> Agendamento de horário </h1><br>
                                <h2> $nome </h2><br>
                                        
                                        
                                <form action='horarios.php' method='POST'>
                                <input type='hidden' name='nome' value='$nome'>
                                    <div class='input-group'>
                                        <label for='data'>Insira o dia</label>
                                        <input type='date' name='data' placeholder=' Insira aqui o dia do serviço' required>
                                    </div>
                                    <div class='input-group'>
                                        <label for='horario'>Insira o horario</label>
                                            <input type='time' name='horario' placeholder=' Insira aqui a hora do serviço' required>
                                    </div>
                                    <div class='input-group'>
                                            <div id='box2'>
                                                <label for='funcionarios'>Selecione o funcionario</label>
                                                    <select name='funcionarios'>";

                                                        $sql2 = "SELECT * FROM funcionario WHERE servico = '$nome';";
                                                        $res2 = mysqli_query($mysqli,$sql2);
                                                        $linhas_funcionario = mysqli_num_rows($res2);
                                                        
                                                        for($j = 0; $j < $linhas_funcionario; $j++)
                                                        {
                                                            $funcionarios = mysqli_fetch_array($res2);
                                                            $nome_fun = $funcionarios["nome"];
                                                            $id_fun = $funcionarios["id_funcionario"]; 
                                                            echo "<option value='$nome_fun'>".$nome_fun."</option>";
                                                        }

                                                echo"</select>
                                            </div>
                                        </div>
                                        <input type='hidden' name='id_fun' value='$id_fun'>
                                        <input type='hidden' name='nome' value='$nome'>
                                        <input type='submit' class='btn' value='Inserir'>";
                            echo"</form>
                            </div>
                        </div>";
                    }

                    if(isset($_POST["data"]) && isset($_POST["horario"]) && isset($_POST["funcionarios"]) && isset($_POST["nome"])){
                
                        $servicos = mysqli_fetch_array($res);
                        $nome_servico = $_POST["nome"];
                        $horario = $_POST["horario"];
                        $dataServico = $_POST["data"];
                        $funcionario = $_POST["funcionarios"];
                        
                        $sql = "SELECT * FROM servicos WHERE nome = '$nome_servico';";
                        $sql_query = $mysqli->query($sql) or die ("Falha na execusão do código:" . $mysqli->error);
                        $servicos = mysqli_fetch_array($sql_query);
                        $duracao = $servicos["duracao"];
                        $duracao_num = intval($duracao);
                        $hora = $duracao_num/60;
                        $minutos = $duracao_num % 60;

                        $hora_servico = strtotime("$hora:$minutos");
                        $soma = $horario + ($hora_servico);
                        $erro = 0;

                        $sql2 = "SELECT * FROM funcionario WHERE nome = '$funcionario';";
                        $res2 = mysqli_query($mysqli,$sql2);
                        $funcionarios = mysqli_fetch_array($res2);
                        $id_fun = $funcionarios["id_funcionario"];
                        
                        $sql3 = "SELECT * FROM agendamento WHERE dataServico = '$dataServico' AND id_funcionario = '$id_fun' AND horario = '$horario' OR horario = '$soma';";
                        //$sql3 = "SELECT * FROM agendamento WHERE dataServico = '$dataServico' AND id_funcionario = '$id_fun' AND horario = '$horario';";
                        $res3 = mysqli_query($mysqli,$sql3);
                        $quantidade = mysqli_num_rows($res3);
                
                        
                        if($quantidade != 0 ){
                            echo "<div class='modal-aviso' id='modal-aviso'>
                                    <div class='modal-aviso-falha'>
                                        <p><a href='javascript:void(0)' class='close-aviso' onclick=\"document.getElementById('modal-aviso').style.visibility = 'hidden';\">&times;</a></p>
                                        <p>Horário indisponível!!</p>";
                                       // <p>$soma , $hora_servico</p>
                                    echo"</div>
                                </div>";
                        $erro = 1;
                        }
                        
                        if($erro == 0){
                            $mysqli = mysqli_connect("localhost","nova","admin","novastudio");
                            $sql = "INSERT INTO agendamento (nome_servico,horario,dataServico,id_funcionario) VALUES ('$nome_servico','$horario','$dataServico','$id_fun');";
                            $sql_query = $mysqli->query($sql) or die ("Falha na execusão do código:" . $mysqli->error);
                            
                            echo "<div class='modal-aviso' id = 'modal-aviso'>
                                    <div class='modal-aviso-sucesso'>
                                        <p><a href='javascript:void(0)' class=close-aviso onclick=\"document.getElementById('modal-aviso').style.visibility = 'hidden';\">&times;</a></p>
                                        <p>Horário salvo com sucesso!!</p>
                                    </div>
                                </div>";
                        }
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
        window.location = 'horarios.php?search='+search.value;
    }
</script>
    </html>

