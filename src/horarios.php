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
     include "functions.php";

     $monthTime = getMonthTime();

     
     echo"<div id='esqueciasenha' class='confirma'>";
     echo "<header>";
     echo '<a href="?month='.prevMonth($monthTime).'">Anterior</a>';
     echo '<h1>'.date('F Y', $monthTime).'</h1>';
     echo '<a href="?month='.nextMonth($monthTime).'">Próximo</a>';
     echo "</header>";
     
     echo "<table>";
     
     echo "
         <thead>
             <tr>
                 <th>DOM</th>
                 <th>SEG</th>
                 <th>TER</th>
                 <th>QUA</th>
                 <th>QUI</th>
                 <th>SEX</th>
                 <th>SAB</th>
             <tr>
         </thead>
     ";
     
     $startDate = strtotime("last sunday", $monthTime);
     
     echo "<tbody>";
     
     for ($row = 0; $row < 6; $row++) {
     
         echo "<tr>";
     
         for ($column = 0; $column < 7; $column++) {
     
             if (date('Y-m', $startDate) !== date('Y-m', $monthTime)) {
                 echo '<td class="other-month">';
             } else {
                 echo "<td>";
             }
     
             echo date('j', $startDate)."</td>";
     
             $startDate = strtotime("+1 day", $startDate);
     
         }
     
         echo "</tr>";
     
     }
     
     echo "</tbody>";
     
     echo "</table>";
     echo "</div>";

     $sql = "SELECT * FROM servicos;"; 
     $res = mysqli_query($mysqli,$sql);
     $linhas = mysqli_num_rows($res);

     for($i = 0; $i < $linhas; $i++)
     {
         $servicos = mysqli_fetch_array($res);
         echo "<p>Nome: ". $servicos["nome"]."</p>";
         echo "<p>Precos: ". $servicos["preco"]."</p>";
         echo "<p>Duracao: ". $servicos["duracao"]."</p>";
         echo "<p><a href='calendario.php?";
         echo "<a href='#inserirhorarios'>Disponibilizar horário</a>";
        }


        if(isset($_POST["horario"]) && isset($_POST["horario"])){
        $horario = $_POST["horario"];
        $$dataServico = $_POST["dataServico"];
        $mysqli = mysqli_connect("localhost","nova","admin","novastudio");
        $sql = "INSERT INTO usuario (id,horario,dataServico) VALUES ('$id','$horario','$dataServico');";
}  
    
    

    

?> 
<div id ="inserirhorarios" class = "confirma">
<div class="confirma-conteudo">
                        <h1> Agendamento de horário </h1><br>
                        <form action="inserir_horarios.php" method="POST">
                     <div class="input-group">
                        <label for="nome">Informe o nome do serviço</label>
                        <input type="text" name="nome" placeholder=" Nome do serviço" title="formato" required>
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
                        </form>
    </div>
</div>
 
</body>
</html>
