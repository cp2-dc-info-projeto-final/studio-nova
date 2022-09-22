<?php
include "conecta.php";
session_start();

$email = $mysqli->real_escape_string($_POST['email']);
$senha = $mysqli->real_escape_string($_POST['senha']);


 $sql_code = "SELECT * FROM  usuario WHERE email = '$email' AND senha= '$senha'";
 $sql_query = $mysqli->query($sql_code) or die ("Falha na execusão do código:" . $mysqli->error);

  $quantidade = $sql_query->num_rows;

  $sql_codead = "SELECT * FROM  administrador WHERE email = '$email' AND senha= '$senha'";
  $sql_queryad = $mysqli->query($sql_codead) or die ("Falha na execusão do código:" . $mysqli->error);

  $quantidadead = $sql_queryad->num_rows;
 

  if($quantidade == 1 )
  { 
      $usuario = $sql_query->fetch_assoc();
      header("location: paginainicial.php");
      
      $_SESSION['id'] = $usuario ['id'];
      $_SESSION['email'] = $usuario ['email'];
  }
  
  if($quantidadead == 1 )
  { 
      $usuario = $sql_query->fetch_assoc();
      header("location: administracao.php");
      
      $_SESSION['id'] = $usuario ['id'];
      $_SESSION['email'] = $usuario ['email'];
  }
else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Nome de usuário ou senha incorretos")';  
            echo '</script>';
}
     

?>