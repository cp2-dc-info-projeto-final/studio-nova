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
            <a class="logo" href="administracao.php"><img id="logo-nav" src="img/logo.png" alt=""></a>
            <ul class="nav-list">
                <h1>Disponibilizar horarios</h1>        
            </ul>
        </nav>
<center>
    <?php
     include "conecta.php";

     $sql = "SELECT * FROM servicos;"; 
     $res = mysqli_query($mysqli,$sql);
     $linhas = mysqli_num_rows($res);

     for($i = 0; $i < $linhas; $i++)
     {
         $servicos = mysqli_fetch_array($res);
         $id = $servicos["id"];
         $nome = $servicos["nome"];
         echo "<p>Nome: ". $nome."</p>";
         echo "<p>Precos: ". $servicos["preco"]."</p>";
         echo "<p>Duracao: ". $servicos["duracao"]."</p>";
         echo "<a href='#inserirhorarios?$id'>Disponibilizar horário</a><br><br>";
        
         echo "<div id ='inserirhorarios?$id' class = 'confirma'>
         <div class='confirma-conteudo'>
                                 <h1> Agendamento de horário </h1><br>
                                 <h2> $nome </h2><br>
                                 <form action='horarios.php' method='POST'>
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
                                                    echo "<option value='$nome_fun'>".$nome_fun."</option>";
                                                }

                                                echo"</select>
                                            </div>
                                        </div>
                                     <input type='submit' class='btn' value='inserir'>";

                                           if(isset($_POST["data"]) && isset($_POST["horario"]) && isset($_POST["funcionarios"])){
                                            $nome_servico = $nome;
                                            $horario = $_POST["horario"];
                                            $dataServico = $_POST["data"];
                                            $duracao = $servicos["duracao"];
                                            $funcionario = $_POST["funcionarios"];
                                            $id_fun = $funcionarios["id_funcionario"];
                                            $soma = $horario + ($duracao/60);
                                            $erro = 0;
                                            
                                            $sql = "SELECT * FROM agendamento WHERE horario = '$horario' AND horario <='$soma';";
                                            $res = mysqli_query($mysqli,$sql);
                                            $quantidade = mysqli_num_rows($res);

                                            
                                            if($quantidade != 0 ){
                                                echo "Horário indisponível";
                                                $erro = 1;
                                            }

                                            
                                           
                                            if($erro == 0){
                                            $mysqli = mysqli_connect("localhost","nova","admin","novastudio");
                                            $sql = "INSERT INTO agendamento (nome_servico,horario,dataServico,id_funcionario) VALUES ('$nome_servico','$horario','$dataServico','$id_fun');";
                                            $sql_query = $mysqli->query($sql) or die ("Falha na execusão do código:" . $mysqli->error);
                                            echo "Horário salvo com sucesso!!";
                                        }
                                            }
                                 
                                 echo"</form>
             </div>
         </div>";

        }
    
    

    

?> 
</center>
    </body>
    </html>

