<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
    <title>Login</title>
    <style>

        body{
            background-color: rgb(30, 24, 35);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="img-box">
            <a href="index.php"><img src="img/logo.png" alt="" class="img1"></a>
        </div>
    
        <div class="form-box">
            <form action="login.php" method="POST">
            <input type="hidden" name="operacao" value="logar">    

            <h2>Login</h2>
            
            <p>Ainda não possui conta ?</p>
            <a href="cadastro.php">Clique aqui</a>

            <div class="input-group">
            <label for="email">Insira seu email</label>
                <input type="email" name="email" placeholder=" Digite aqui seu e-mail" required>
            </div>
            <div class="input-group">
            <label for="email">Insira sua senha</label>
                <input type="password" name="senha" placeholder=" Digite aqui sua senha" required>
            </div>

            <a href="#esqueciasenha">Esqueci minha senha</a>

            <input type="submit" class="btn" value="Entrar">
            

        </form>
    </div>
</div>
                    <div id="esqueciasenha" class="confirma">
                        <div class="confirma-conteudo">
                        <h1>Insira aqui seu email</h1><br>
                        <p>Para enviarmos um formulário de recuperação de senha</p><br>
                        <input type="hidden" name="operacao" value="esqueci">
                        <form action="login.php" method="POST">
                            <div class="input-group">
                                <label for="email">Insira seu email</label>
                                <input type="email" name="email" placeholder=" Insira aqui seu email" title="formato">
                            </div>
                            <input type="submit" class="btn" value="Enviar email">
                        </form>
                        
                        
                        <?php
                            include "conecta.php";

                    if(isset($_POST["email"]) || isset($_POST["senha"])) 
                    {
                        $operacao = $_REQUEST["operacao"];

                        if($operacao == "logar")
                        {
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
                              
                              else if($quantidade != 1)
                              {
                                        
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
                            
                                    if($quantidade_ad != 1)
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
                                        
                                          else
                                            {
                                              session_start();
                                              $_SESSION['id'] = $funcionario ['id'];
                                              $_SESSION['email'] = $funcionario ['email'];
                                              $_SESSION['senha'] = $funcionario ['senha'];
                                              $_SESSION['tipo'] = "funcionario";
                                  
                                              header("location: funcionarios.php");
                                            }
                                      }
                                      else
                                      {
                                        echo '<script type ="text/JavaScript">';  
                                        echo 'alert("Nome de usuário ou senha incorretos")';  
                                        echo '</script>';
                                      }
                                    }
                            
                              }
                        }

                        if($operacao == "esqueci"){
                                                  
                                                  $email = $_POST['email'];
                                                  
                                                  $rash = md5(rand());
                                                  $mysqli = mysqli_connect("localhost","nova","admin","novastudio");
                                                  $sql_code = "INSERT INTO recupera_senha (email,rash) VALUES ($email,$rash) ";
                                                  $sql_query = $mysqli->query($sql_code) or die ("Falha na execusão do código:" . $mysqli->error);
                      
                      
                        
                      
                                                  $sql_code2 = "SELECT * FROM  usuario WHERE email = '$email'";
                                                  $sql_query2 = $mysqli->query($sql_code2) or die ("Falha na execusão do código:" . $mysqli->error);
                      
                                                  $quantidade = $sql_query->num_rows;
                      
                                                  if($quantidade == 1)
                                                  {
                                                      
                                                    echo "entrei no if";
                                                      //include "envia_email.php";
                      
                                                      
                                                      $sql_code = "SELECT * FROM  usuario WHERE nome AND sobrenome";
                                              
                                                          $usuario = mysqli_fetch_array($sql_query);
                      
                                                          $nome = $usuario['nome'];
                                                          $sobrenome = $usuario['sobrenome'];
                                                          $data = date('a/m/Y');
                                                          $email = $_POST['email'];
                      
                                                          $assunto = "Recuperar senha";
                      
                                                          $mensagem = "Olá, $nome $sobrenome <br>";
                                                          $mensagem = "<html><header>";
                                                          $mensagem = "
                                                                  <h2>Você solicitou uma nova senha?</h2>
                                                                  <h3>Se sim clique no link abaixo </h3>
                                                                  <p><a href='http://127.0.0.1:8080/TCC-NOVA-STUDIO/studio-nova/src/alterar_senha.php'></a></p> 
                                                                  <h5>Caso você não tenha solicitado esse serviço verifique seus dados</h5>
                                                          ";
                                                          $mensagem .=  "</html></header>";
                      
                                                          //if(envia_email($email, $assunto, $mensagem)){
                                                              //echo "<p>Um email com as instruções para sua nova senha foi enviado!</p>";
                                                          //}
                                                          //else{
                                                              //echo "<p>Falha no envio do e-mail</p>";
                                                         // }
                                                         
                                                  }
                                                  else{
                                                      echo "<br><p>Email não encontrado, por favor digite corretamente</p>";
                                                  } 
                      
                                                  
                        }
                        
                        }
                    
                    
                        ?>

                    </div>
                    
</body>
</html>