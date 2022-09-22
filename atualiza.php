<?php
        include "conecta.php";

        if ($erro == 0){
            $sql= "UPDATE usuario SET nome = '$nome', email= '$email,
            id= $id, senha = $senha;";  
            mysqli_query($mysqli, $sql);

            echo "Cliente atualizado com sucesso!<br>";
            echo "<a href='form_extra.html'>Voltar para o início</a>";
        }
  ?>      
