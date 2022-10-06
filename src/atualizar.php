<?php
include ("conecta.php");

$nome = $_POST ["nome"];
$email = $_POST ["email"];
$id = $_POST ["id"];
$id_fun = $_POST["id_fun"];

if($id != 0){
$sql = "UPDATE usuario SET nome = '$nome', email = '$email' WHERE id = $id;";  
mysqli_query($mysqli,$sql);

echo "Cliente atualizado com sucesso!<br>";
echo "<a href='administracao.php'>Voltar para o início</a>";
}

if($id_fun != 0){
    $sql = "UPDATE funcionario SET nome = '$nome', email = '$email' WHERE id_funcionario = $id_fun;";  
    mysqli_query($mysqli,$sql);
    
    echo "Funcionário atualizado com sucesso!<br>";
    echo "<a href='administracao.php'>Voltar para o início</a>";
    } 
?>