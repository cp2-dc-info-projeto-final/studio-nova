<?php 
    include "conecta.php";

    
    $id = $_GET["id"];
    $sql = "SELECT * FROM usuario WHERE id = $id;"; 
    $res = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($res);
?>
<html>
    <head>
        <title>Edição de Cliente</title>
        <form action="atualizar" method="POST"> 
        <meta charset="UTF-8">
      </head>
       <body>
            <div class="input-group">
                 <input type="hidden"  value="editar">
                <input type="hidden" name="id" value="<?php echo $id?>">
                    <label for="nome">Nome completo</label>
                    <input type="text" name="nome" placeholder=" Digite aqui seu nome completo" pattern="[a-zA-Z]+$" required value="<?php echo $usuario['nome']?>">
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
            
                <input type="submit" class="btn" value="enviar">
        
            </form>
        </div>
    </div>
</body>
</html>
