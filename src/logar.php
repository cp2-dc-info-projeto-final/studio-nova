<?php
include "conecta.php";
session_start();

$email = $mysqli->real_escape_string($_POST['email']);
$senha = $mysqli->real_escape_string($_POST['senha']);


 $sql_code = "SELECT * FROM  usuario WHERE email = '$email' AND senha= '$senha'";
 $sql_query = $mysqli->query($sql_code) or die ("Falha na execusão do código:" . $mysqli->error);

  $quantidade = $sql_query->num_rows;

  $sql_code_ad = "SELECT * FROM  administrador WHERE email = '$email' AND senha= '$senha'";
  $sql_query_ad = $mysqli->query($sql_code_ad) or die ("Falha na execusão do código:" . $mysqli->error);

  $quantidade_ad = $sql_query_ad->num_rows;

  $sql_code_fun = "SELECT * FROM  funcionario WHERE email = '$email' AND senha= '$senha'";
  $sql_query_fun = $mysqli->query($sql_code_fun) or die ("Falha na execusão do código:" . $mysqli->error);

  $quantidade_fun = $sql_query_fun->num_rows;
 

  if($quantidade == 1 )
  { 
      $usuario = $sql_query->fetch_assoc();
      header("location: paginainicial.php");
      
      $_SESSION['id'] = $usuario ['id'];
      $_SESSION['email'] = $usuario ['email'];
  }
  
  if($quantidade_ad == 1 )
  { 
      $usuario = $sql_query_ad->fetch_assoc();
      header("location: administracao.php");
      
      $_SESSION['id'] = $usuario ['id'];
      $_SESSION['email'] = $usuario ['email'];
  }
  if($quantidade_fun == 1)
  {
      $usuario = $sql_query_fun->fetch_assoc();
      header("location: funcionarios.php");
      
      $_SESSION['id'] = $usuario ['id'];
      $_SESSION['email'] = $usuario ['email'];
  }
else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Nome de usuário ou senha incorretos")';  
            echo '</script>';
}
     

?>