<?php
include ("conecta.php");

$nome = $_POST ["nome"];
$email = $_POST ["email"];
$id = $_POST ["id"];
$sql = "UPDATE usuario SET nome = '$nome', email = '$email' WHERE id = $id;";  
mysqli_query($mysqli,$sql);

echo "Cliente atualizado com sucesso!<br>";
echo "<a href='administracao.php'>Voltar para o início</a>"; 
?>