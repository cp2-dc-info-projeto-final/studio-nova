<?php
include ("conecta.php");

$nome = $_POST ["nome"];
$email = $_POST ["email"];
$senha1 =  $_POST ["senha1"];
$senha2 = $_POST ["senha2"];
$id = $_POST ["id"];
$id_fun = $_POST["id_fun"];
$erro = 0;

if(!hash_equals($senha1,$senha2)){
    echo "senha incorreta";
    echo "<a href='editusu.php'>Voltar para a edição</a>";
    $erro == 1;
}

if($id != 0 && $erro == 0){
$sql = "UPDATE usuario SET nome = '$nome', email = '$email' WHERE id = $id;";  
mysqli_query($mysqli,$sql);

echo "Cliente atualizado com sucesso!<br>";
echo "<a href='administracao.php'>Voltar para o início</a>";
}

if($id_fun != 0 && $erro == 0){
    $sql = "UPDATE funcionario SET nome = '$nome', email = '$email' WHERE id_funcionario = $id_fun;";  
    mysqli_query($mysqli,$sql);
    
    echo "Funcionário atualizado com sucesso!<br>";
    echo "<a href='administracao.php'>Voltar para o início</a><br>";
    } 
    
?>