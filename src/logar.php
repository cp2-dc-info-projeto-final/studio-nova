<?php
include "conecta.php";
session_start();

$email = $mysqli->real_escape_string($_POST['email']);
$senha = $mysqli->real_escape_string($_POST['senha']);


 $sql_code = "SELECT * FROM  usuario WHERE email = '$email' AND senha ='$senha'";
 $sql_query = $mysqli->query($sql_code) or die ("Falha na execusão do código:" . $mysqli->error);

  $quantidade = $sql_query->num_rows;

  $sql_code_ad = "SELECT * FROM  administrador WHERE email = '$email' AND senha ='$senha'";
  $sql_query_ad = $mysqli->query($sql_code_ad) or die ("Falha na execusão do código:" . $mysqli->error);

  $quantidade_ad = $sql_query_ad->num_rows;

  $sql_code_fun = "SELECT * FROM  funcionario WHERE email = '$email' AND senha ='$senha'";
  $sql_query_fun = $mysqli->query($sql_code_fun) or die ("Falha na execusão do código:" . $mysqli->error);

  $quantidade_fun = $sql_query_fun->num_rows;
 

  if($quantidade == 1 )
  {
            $usuario = $sql_query->fetch_assoc();
            session_start();
            $_SESSION['id'] = $usuario ['id'];
            $_SESSION['email'] = $usuario ['email'];
            $_SESSION['senha'] = $usuario ['senha'];
            $_SESSION['tipo'] = "cliente";
      
            header("location: paginainicial.php");
  }
  
  if($quantidade_ad == 1 )
  {    
            $administrador = $sql_query_ad->fetch_assoc();
            session_start();
            $_SESSION['id'] = $administrador ['id'];
            $_SESSION['email'] = $administrador ['email'];
            $_SESSION['senha'] = $administrador ['senha'];
            $_SESSION['tipo'] = "administrador";
      
            header("location: administracao.php");
         }
  if($quantidade_fun == 1)
  {
            $funcionario = $sql_query_fun->fetch_assoc();
            session_start();
            $_SESSION['id'] = $funcionario ['id'];
            $_SESSION['email'] = $funcionario ['email'];
            $_SESSION['senha'] = $funcionario ['senha'];
            $_SESSION['tipo'] = "funcionario";
      
            header("location: funcionarios.php");
  }
else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Nome de usuário ou senha incorretos")';  
            echo '</script>';
}
     

?>
