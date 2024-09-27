<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/nova.css">
  <title>Agendamento finalizado!!</title>
  <style>

        body{
            background-color: rgb(30, 24, 35);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            min-height: 100vh;
        }
        p{
          color:white;
          font-size:20px;
        }
    </style>
</head>
<body>
  <center>
    <?php
          include "autentica.php";
          include "conecta.php";

          if(isset($_GET["id_agendamento"]) && isset($_GET["id_usuario"])){
          $id_agendamento = $_GET["id_agendamento"];
          $id_usuario = $_GET["id_usuario"];

          $mysqli = mysqli_connect("localhost","nova","admin","novastudio");
          $sql = "UPDATE agendamento SET id_usuario = '$id_usuario' WHERE id = $id_agendamento;";  
          $sql_query = $mysqli->query($sql) or die ("Falha na execusão do código:" . $mysqli->error);

          $sql2 = "SELECT * FROM agendamento WHERE id = '$id_agendamento';";
          $res2 = mysqli_query($mysqli,$sql2);
          $agendamento = mysqli_fetch_array($res2);
          
          $dia = $agendamento["dataServico"];
          $hora = $agendamento["horario"];
          $servico = $agendamento ["nome_servico"];
          $id_funcionario = $agendamento ["id_funcionario"];

          $sql3 = "SELECT * FROM funcionario WHERE id_funcionario = '$id_funcionario';";
          $res3 = mysqli_query($mysqli,$sql3) or die ("Falha na execusão do código:" . $mysqli->error);;
          $funcionario = mysqli_fetch_array($res3);

          $nome_funcionario= $funcionario["nome"];

          mysqli_close($mysqli);
              echo "<p>
                      <a>
                        <svg xmlns='http://www.w3.org/2000/svg' width='80' height='80' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
                            <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                            <path d='M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z'/>
                        </svg>
                      </a>
                    </p>
            <h1>Agendamento efetuado com sucesso!!!</h1><br>
            <p>Parabéns você acaba de fazer um agendamento no Nova studio!!!</p>
            <p>Você agendou $servico, no dia $dia às $hora !! </p>
            <p>Seu serviço será feito pela $nome_funcionario</p><br>
            <p><a href='paginainicial.php'>Voltar para página inicial</a></p> 
            ";
          }
    ?>
    </center>
</body>
</html>
