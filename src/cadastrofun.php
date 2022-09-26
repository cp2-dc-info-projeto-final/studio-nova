<!DOCTYPE html> 
 <html lang="en"> 
 <head> 
     <meta charset="UTF-8"> 
     <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
     <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
     <link rel="stylesheet" href="css/nova.css"> 
     <title>Cadastro de funcionários</title> 
     <style> 
  
         body{ 
             background-color: rgb(30, 24, 35); 
             background-position: center; 
             background-repeat: no-repeat; 
             background-size: cover; 
             display: flex; 
             align-items: center; 
             justify-content: center; 
             padding: 20px; 
             min-height: 100vh; 
         } 
     </style> 
 </head> 
 <body> 
     <div class="box"> 
         <div class="img-box"> 
             <a href="administracao.php"><img src="img/logo.png" alt="" class="img1"></a> 
         </div> 
         <div class="form-box"> 
             <form action="cadastrofun.php" method="POST"> 
              
                 <h2>Cadastro de Funcionários</h2> 
              
                 <div class="input-group"> 
                     <label for="nome">Nome completo do funcionário</label> 
                     <input type="text" name="nome" placeholder=" Digite aqui o nome completo do funcionário" required>
                 </div>
 
                 <div class="input-group"> 
                     
                  <label for="cpf">CPF do funcionário</label> 
                     <input type="number" name="cpf" placeholder=" Digite aqui o cpf do funcionário sem linhas e traços" required> 
                 </div> 
 
                 <div class="input-group"> 
                     
                  <label for="tel">Celular do funcionário</label> 
                     <input type="number" name="tel" placeholder=" Digite aqui o número do funcionário com ddd" required> 
                 </div> 
                 
                 <div class="input-group"> 
                     <label for="email">Informe o e-mail do funcionário</label> 
                     <input type="text" name="email" placeholder=" Digite o email que o funcionário usará para acessar o sistema" title="formato" pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required> 
                 </div> 
                 <div class="input-group w50"> 
                     <label for="senha1">Crie uma senha</label> 
                     <input type="password" name="senha1" placeholder=" Crie a senha do funcionário" maxlength="14" required> 
                 </div> 
                 <div class="input-group w50"> 
                     <label for="senha2">Confirme a senha</label>     
                     <input type="password" name="senha2" placeholder=" Confirme a senha" maxlength="14" required> 
                 </div> 
              
                 <input type="submit" class="btn" value="Cadastrar funcionário"> 
          
             </form> 
         </div> 
     </div> 
 </body> 
 </html> 
 <?php 
     session_start(); 
     include_once("conecta.php"); 
  
     if(isset ($_POST ["nome"]) || isset ($_POST ["email"]) || isset ($_POST ["senha1"]) || isset ($_POST ["senha2"]) || isset ($_POST ["cpf"]) || isset ($_POST ["tel"])){ 
     $nome = $_POST ["nome"]; 
     $email = $_POST ["email"]; 
     $senha1 = $_POST ["senha1"]; 
     $senha2 = $_POST ["senha2"];
     $tel = $_POST ["tel"];
     $cpf = $_POST ["cpf"];
     $erro = 0; 
     $error = ""; 
  
     if(empty($nome) or strstr($nome, ' ') == false) 
     { 
         echo "Por favor, insira seu nome"; 
         $erro = 1; 
     } 
     if(($senha1 == $senha2) == false) 
     { 
         echo "As senhas não são correspondentes.<br>"; 
         $erro = 1; 
     } 
     if($email == $senha2) 
     { 
         echo "O email e a senha não podem ser iguais.<br>"; 
         $erro = 1; 
     } 
  
     if($erro == 0) 
     { 
         $mysqli = mysqli_connect("localhost","nova","admin","novastudio"); 
         $sql = "INSERT INTO funcionario (nome,email,senha,cpf,telefone)"; 
         $sql .= "VALUES ('$nome','$email','$senha2','$cpf','$tel');";   
         mysqli_query($mysqli,$sql); 
         mysqli_close($mysqli); 
  
         echo '<script type ="text/JavaScript">';   
         echo 'alert("Funcionário cadastrado com sucesso!!")';   
         echo '</script>'; 
  
     } 
     
 } 
 ?>
