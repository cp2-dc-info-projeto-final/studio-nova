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

    if(isset($_GET["id_cliente"]) && $_GET["id_cliente"] != ""){
        
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $id = $_GET["id_cliente"];
        $sql = "DELETE FROM usuario WHERE id = $id;"; 
        mysqli_query($mysqli,$sql);
        echo "<center>
                <div class='modal-aviso'>
                    <div class='modal-aviso-sucesso'>
                        <p>Cliente excluído com sucesso!</p>
                        <p><a href='administracao.php' class='close-aviso-btn'>Voltar para o início</a></p>
                        <p><a href='listacli.php' class='close-aviso-btn'>Voltar para lista de clientes</a></p>
                    </div>
                </div>
            </center>";
        
    } 

    if(isset($_GET["id_funcionario"]) && $_GET["id_funcionario"] != ""){
    
        $id = $_GET["id_funcionario"];
        $sql = "DELETE FROM funcionario WHERE id_funcionario = $id;"; 
        mysqli_query($mysqli,$sql);
        echo "<center>
                <div class='modal-aviso'>
                    <div class='modal-aviso-sucesso'>
                        <p>Funcionário excluído com sucesso!</p>
                        <p><a href='administracao.php' class='close-aviso-btn'>Voltar para o início</a></p>
                        <p><a href='listafun.php' class='close-aviso-btn'>Voltar para lista de funcionarios</a></p>
                    </div>
                </div>
            </center>";
        }
?>
</body>
</html>
