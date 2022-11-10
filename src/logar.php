<?php
include "conecta.php";
session_start();

$email = $mysqli->real_escape_string($_POST['email']);
$senha = $mysqli->real_escape_string($_POST['senha']);


 $sql_code = "SELECT * FROM  usuario WHERE email = '$email'";
 $sql_query = $mysqli->query($sql_code) or die ("Falha na execusão do código:" . $mysqli->error);

  $quantidade = $sql_query->num_rows;

  if($quantidade == 1 )
  {          
    
            $sql_code = "SELECT * FROM  usuario WHERE senha = '$senha'";

            $usuario = mysqli_fetch_array($sql_query);
             if(!password_verify($senha, $usuario['senha']))
             {
              echo "Senha inválida!";
              echo "<p><a href='login.php'>Página de login</a></p>";
            }
            else {
              session_start();
              $_SESSION['id'] = $usuario['id'];
              $_SESSION['nome'] = $usuario['nome'];
              $_SESSION['email'] = $usuario['email'];
              $_SESSION['senha'] = $usuario['senha'];
              $_SESSION['tipo'] = "cliente";
              $_SESSION['bemvindo'] = "Bem vindo de volta !";
        
              header("location: paginainicial.php");
            }
            
  }
  
  else if($quantidade != 1){
            
            $sql_code_ad = "SELECT * FROM  administrador WHERE email = '$email'";
            $sql_query_ad = $mysqli->query($sql_code_ad) or die ("Falha na execusão do código:" . $mysqli->error);
            
            $quantidade_ad = $sql_query_ad->num_rows;
  
            if($quantidade_ad == 1 ){
  
              
              $sql_code = "SELECT * FROM administrador WHERE senha = '$senha'";

              $administrador = mysqli_fetch_array($sql_query_ad);
             if(!password_verify($senha, $administrador['senha']))
              {
                echo "Senha inválida!";
                echo "<p><a href='login.php'>Página de login</a></p>";
              }
              else{
                
            session_start();
            $_SESSION['id'] = $administrador ['id'];
            $_SESSION['email'] = $administrador ['email'];
            $_SESSION['senha'] = $administrador ['senha'];
            $_SESSION['tipo'] = "administrador";
      
            header("location: administracao.php");
         }
        }
        }

  else
  {       
        $sql_code_fun = "SELECT * FROM  funcionario WHERE email = '$email'";
        $sql_query_fun = $mysqli->query($sql_code_fun) or die ("Falha na execusão do código:" . $mysqli->error);

        $quantidade_fun = $sql_query_fun->num_rows;

        if($quantidade_fun == 1)
        {

            $sql_code = "SELECT * FROM funcionario WHERE senha = '$senha'";

            $funcionario = mysqli_fetch_array($sql_query_fun);
             if(!password_verify($senha, $funcionario['senha']))
             {
              echo "Senha inválida!";
              echo "<p><a href='login.php'>Página de login</a></p>";
            }            
            
            else{

            session_start();
            $_SESSION['id'] = $funcionario ['id'];
            $_SESSION['email'] = $funcionario ['email'];
            $_SESSION['senha'] = $funcionario ['senha'];
            $_SESSION['tipo'] = "funcionario";
      
            header("location: funcionarios.php");
            }
      }
    else{
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Nome de usuário ou senha incorretos")';  
        echo '</script>';
        }
}
    

?>
