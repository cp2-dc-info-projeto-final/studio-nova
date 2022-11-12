<?php
include ("conecta.php");

$nome = $_POST ["nome"];
$email = $_POST ["email"];
$senha =  $_POST ["senha"];
$id = $_POST ["id"];
$id_fun = $_POST["id_fun"];
$erro = 0;

$sql_code = "SELECT * FROM  usuario WHERE senha = '$senha'";
$sql_query = $mysqli->query($sql_code);
$usuario = mysqli_fetch_array($sql_query);
if(!password_verify($senha, $usuario['senha']))
{
echo "Senha inválida! Tente novamente";
echo "<p><a href='editusu.php'>voltar para edição</a></p>";
$erro = 1;
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