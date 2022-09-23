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

$id = $_GET["id"];
$sql = "DELETE FROM usuario WHERE id = $id;"; 
mysqli_query($mysqli,$sql);
echo "Cliente excluído com sucesso!<br>";
echo "<a href='administracao.php'>Voltar para o início</a><br>";
echo "<a href='listacli.php'>Voltar para lista de clientes</a>";
?>
</body>
</html>
