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
            <form action="logar.php" method="POST">
            <input type="hidden" name="operacao" value="logar" method="POST">

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

            <a href="#esqueciasenha" onclick="openModal()">Esqueci minha senha
            <input type="hidden" name="operacao" value="esqueci">
            </a>

            <input type="submit" class="btn" value="Entrar">
            

        </form>
    </div>
</div>
                    <div id="esqueciasenha" class="confirma">
                        

                        <div class="confirma-conteudo">
                        <a href="javascript:void(0)" class="close" onclick="closeModal()">&times;</a>
                        <h1>Insira aqui seu email</h1><br>
                        <p>Para enviarmos um formulário de recuperação de senha</p><br>
                        <form action="login.php" method="POST">
                            <div class="input-group">
                                <label for="email_2">Insira seu email</label>
                                <input type="email" name="email_2" placeholder=" Insira aqui seu email" title="formato">
                            </div>
                            <input type="submit" class="btn" value="Enviar email">
                        </form>
                     
                        <?php

                        if(isset($_POST["email_2"])){

                          include "conecta.php";

                          $email = $_POST['email_2'];
                          
                          $rash = md5(rand());
                          $mysqli = mysqli_connect("localhost","nova","admin","novastudio");
                          $sql_code = "INSERT INTO recupera_senha (email,rash) VALUES ('$email','$rash');";
                          $sql_query = $mysqli->query($sql_code) or die ("Falha na execusão do código AQUI:" . $mysqli->error);

                          $sql_code2 = "SELECT * FROM  usuario WHERE email = '$email'";
                          $sql_query2 = $mysqli->query($sql_code2) or die ("Falha na execusão do código:" . $mysqli->error);

                          $quantidade = $sql_query2->num_rows;

                          if($quantidade == 1)
                          {
                              
                              include "envia_email.php";

                              
                              $sql_code = "SELECT * FROM  usuario WHERE nome AND sobrenome";
                      
                                  $usuario = mysqli_fetch_array($sql_query2);

                                  $nome = $usuario['nome'];
                                  $sobrenome = $usuario['sobrenome'];
                                  $data = date('a/m/Y');
                                  $email = $_POST['email_2'];

                                  $assunto = "Recuperar senha";

                                  $mensagem = "Olá, $nome $sobrenome <br>";
                                  $mensagem = "<html><header>";
                                  $mensagem = "
                                          <h2>Você solicitou uma nova senha?</h2>
                                          <h3>Se sim clique no link abaixo </h3>
                                          <p><a href='http://127.0.0.1:8080/novastudio/studio-nova/src/alterar_senha.php'>Clique aqui</a></p> 
                                          <h5>Caso você não tenha solicitado esse serviço verifique seus dados</h5>
                                  ";
                                  $mensagem .=  "</html></header>";

                                  if(envia_email($email, $assunto, $mensagem)){
                                      echo "<p>Um email com as instruções para sua nova senha foi enviado!</p>";
                                  }
                                  else{
                                      echo "<p>Falha no envio do e-mail</p>";
                                  }
                                 
                          }
                          else{
                              echo "<br><p>Email não encontrado, por favor digite corretamente</p>";
                          } 
                      
                        }
                    
                    
                        ?>

</div>

</body>
<script>
    function closeModal() {
  document.getElementById("esqueciasenha").style.visibility = "hidden";
}
function openModal() {
  document.getElementById("esqueciasenha").style.visibility = "visible";
}
</script>
</html>