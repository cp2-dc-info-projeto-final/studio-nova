<?php 
 include "conecta.php";

 
 $sql = "SELECT * FROM usuario;"; 
 $res = mysqli_query($mysqli,$sql);
 $linhas = mysqli_num_rows($res);

 for($i = 0; $i < $linhas; $i++)
 {
     $cliente = mysqli_fetch_array($res);
     echo "<p>Nome: ".$cliente["nome"]."</p>";
     echo "<p>E-mail: ".$cliente["email"]."</p>";
     echo "<p><a href='edit.php?id=".$cliente["id"]."'>
     Editar cliente</a></p>";
     echo "<p><a href='excluir.php?id=".$cliente["id"]."'> Excluir cliente</a></p>";
 
 }

   if(isset($_GET["id"]) && $_GET["id"] != ""){
        
        $id = $_GET["id"];
        $sql = "SELECT * FROM usuario WHERE id = $id;"; 
        $res = mysqli_query($mysqli,$sql);
        $usuario = mysqli_fetch_array($res);
    }
    
     else if(isset($_GET["id_funcionario"]) && $_GET["id_funcionario"] != ""){
    
        $id_fun = $_GET["id_funcionario"];
        $sql = "SELECT * FROM funcionario WHERE id_funcionario = $id_fun;"; 
        $res = mysqli_query($mysqli,$sql);
        $usuario = mysqli_fetch_array($res);
        }
?>


<html>
    <head>
        <title>Edição de Cliente</title>
        <form action="atualizar.php" method="POST"> 
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/nova.css">
      </head>
       <body>
       
       <div class="box">

       <div class="form-box">
            <form action="atualizar.php" method="POST">

                <div class="input-group">
                    <input type="hidden"  value="editar">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="hidden" name="id_fun" value="<?php echo $id_fun?>">
                        <label for="nome">Nome completo</label>
                        <input type="text" name="nome" placeholder=" Digite aqui seu nome completo" required value="<?php echo $usuario['nome']?>">
                    </div>
               
                    <div class="input-group">
                        <label for="email">Informe seu e-mail</label>
                        <input type="text" name="email" placeholder=" Digite aqui seu email" title="formato" pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required value="<?php echo $usuario['email']?>">
                    </div>
                    <div class="input-group w50">
                        <label for="senha1">Crie sua senha</label>
                        <input type="password" name="senha1" placeholder=" Crie sua senha" maxlength="14" required value="<?php echo $usuario['senha']?>">
                    </div>
                    <div class="input-group w50">
                        <label for="senha2">Confirme sua senha</label>    
                        <input type="password" name="senha2" placeholder=" Confirme sua senha" maxlength="14" required>
                    </div>
            
                    <input type="submit" class="btn" value="Editar">
        
                </form>
            </div>
        </div>
</body>
</html>
