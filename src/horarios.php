<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <title>Document</title>
</head>
<body>
    <?php
     include "conecta.php";

     $sql = "SELECT * FROM servicos;"; 
     $res = mysqli_query($mysqli,$sql);
     $linhas = mysqli_num_rows($res);

     for($i = 0; $i < $linhas; $i++)
     {
         $servicos = mysqli_fetch_array($res);
         echo "<p>Nome: ". $servicos["nome"]."</p>";
         echo "<p>Precos: ". $servicos["preco"]."</p>";
         echo "<p>Duracao: ". $servicos["duracao"]."</p>";
         echo "<a href='#inserirhorarios'>Disponibilizar horário</a>";
         
        }
    
    

    

?> 
<div id ="inserirhorarios" class = "confirma">
<div class="confirma-conteudo">
                        <h1> Agendamento de horário </h1><br>
                        <form action="horarios.php" method="POST">
                        <div class="input-group">
                        <label for="nome_servico">Informe o nome do serviço</label>
                        <input type="text" name="nome_servico" placeholder=" Nome do serviço" title="formato" required>
                      </div>
                        <div class="input-group">
                                <label for="data">Insira o dia</label>
                                <input type="date" name="data" placeholder=" Insira aqui seu email" title="formato">
                            </div>
                            <div class="input-group">
                                <label for="horario">Insira o horario</label>
                                <input type="time" name="horario" placeholder=" Insira aqui seu email" title="formato">
                            </div>
                            <input type="submit" class="btn" value="inserir">
                            <?php
                                if(isset($_POST["data"]) && isset($_POST["horario"])){
                                $nome_servico = $_POST ["nome_servico"];
                                $horario = $_POST["horario"];
                                $dataServico = $_POST["data"];
                                $erro = 0;
                                
                                $sql_code = "SELECT * FROM  servicos WHERE nome = '$nome_servico'";
                                $sql_query = $mysqli->query($sql_code) or die ("Falha na execusão do código:" . $mysqli->error);
                            
                                $quantidade = $sql_query->num_rows;

                                if($quantidade == 0){
                                    echo "Nome de serviço incorreto, favor preenche-lo corretamente";
                                    $erro = 1;
                                }
                                if($erro == 0){
                                $mysqli = mysqli_connect("localhost","nova","admin","novastudio");
                                $sql = "INSERT INTO horarios (nome_servico,horario,dataServico) VALUES ('$nome_servico','$horario','$dataServico');";
                                $sql_query = $mysqli->query($sql) or die ("Falha na execusão do código:" . $mysqli->error);
                                echo "Horário salvo com sucesso!!";
                            }
                                }  
                            ?>
                        </form>
    </div>
</div>
 
</body>
</html>
