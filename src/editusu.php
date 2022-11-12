<?php 

 include "autentica.php";
 include "conecta.php";

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM usuario WHERE id = $id;"; 
    $res = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($res);

?>


<html>
    <head>
        <title>Edição de Cliente</title>
        <form action="atualizar.php" method="POST"> 
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/nova.css">
      </head>
       <body>
       <center>
       <div class="box">

       <div class="form-box">
            <form action="atualizar.php" method="POST">
                
            <input type="hidden" name="id_fun" value="0">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <div class="input-group w50">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" placeholder=" Digite aqui seu nome" required value="<?php echo $usuario['nome']?>">
                </div>
                <div class="input-group w50">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" name="sobrenome" placeholder=" Digite aqui seu sobrenome" required value="<?php echo $usuario['sobrenome']?>">
                </div>
               
                    <div class="input-group">
                        <label for="email">Informe seu e-mail</label>
                        <input type="text" name="email" placeholder=" Digite aqui seu email" title="formato" pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required value="<?php echo $usuario['email']?>">
                    </div>
                    <a href="#botao-confirma">Editar</a>
                    <div id="botao-confirma" class="confirma">
                        <div class="confirma-conteudo">
                        <h1>Insira sua senha para confirmar a edição</h1><br>
                            <div class="input-group">
                                <label for="senha">Confirme a senha</label>
                                <input type="password" name="senha" placeholder=" Confirme aqui sua senha" title="formato">
                                </div>
                        <input type="submit" class="btn" value="Editar dados">

                    </div>
    </div>
            
                    
        
                </form>
            </div>
        </div>
        </center>
</body>
</html>
