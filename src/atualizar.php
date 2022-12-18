
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nova.css">
</head>
<body>

<?php
        include ("autentica.php");
        include ("conecta.php");

        if($tipo == "administrador"){
        
        $nome = $_POST ["nome"];
        $email = $_POST ["email"];
        $senha =  $_POST ["senha"];
        $sobrenome = $_POST ["sobrenome"];
        $id = $_POST ["id"];
        $id_fun = $_POST["id_fun"];
        $erro = 0;

        $sql_code = "SELECT * FROM  usuario WHERE id = '$id';";
        $sql_query = $mysqli->query($sql_code);


                $usuario = mysqli_fetch_array($sql_query);
                if(!password_verify($senha , $usuario['senha']))
                {
                    echo "<div class='modal-aviso' id='modal-aviso'>
                            <div class='modal-aviso-falha'>
                                <center>
                                    <p>Senha inválida!</p>
                                    <p>Tente novamente!!</p>";
                    echo "          <p><a href='editusu.php' class='close-aviso-btn'>Clique aqui para voltar</a></p>
                                </center>
                            </div>
                        </div>";
                $erro = 1;
                }

                if($id != 0 && $erro == 0){
                $sql = "UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome' ,email = '$email' WHERE id = $id;";  
                mysqli_query($mysqli,$sql);

                echo "<div class='modal-aviso' id = 'modal-aviso'>
                        <div class='modal-aviso-sucesso'>
                            <center>
                                <p>Cliente atualizado com sucesso!</p>";
                echo "          <a href='administracao.php'>Voltar para o início</a>
                            </center>
                        </div>
                    </div>";
                }
                
                if($id_fun != 0 && $erro == 0){
                    $sql = "UPDATE funcionario SET nome = '$nome', email = '$email' WHERE id_funcionario = $id_fun;";  
                    mysqli_query($mysqli,$sql);
                    
                    echo "<div class='modal-aviso' id = 'modal-aviso'>
                            <div class='modal-aviso-sucesso'>
                                <center>
                                    <p>Funcionário atualizado com sucesso!</p>";
                        echo "      <a href='administracao.php'>Voltar para o início</a><br>
                                </center>
                            </div>
                        </div>";
                    } 
            }
            elseif($tipo == "cliente"){
                
                $nome = $_POST ["nome"];
                $email = $_POST ["email"];
                $senha =  $_POST ["senha"];
                $sobrenome = $_POST ["sobrenome"];
                $id = $_POST ["id"];
                $id_fun = $_POST["id_fun"];
                $erro = 0;

                $sql_code = "SELECT * FROM  usuario WHERE id = '$id';";
                $sql_query = $mysqli->query($sql_code);


                $usuario = mysqli_fetch_array($sql_query);
                if(!password_verify($senha , $usuario['senha']))
                {
                echo "<div class='modal-aviso' id='modal-aviso'>
                        <div class='modal-aviso-falha'>
                            <center>
                                <p>Senha inválida!</p>
                                <p>Tente novamente!!</p>";
                echo "          <p><a href='editusu.php' class='close-aviso-btn'>Clique aqui para voltar</a></p>
                            </center>
                        </div>
                    </div>";
                $erro = 1;
                }

                if($id != 0 && $erro == 0){
                $sql = "UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome' ,email = '$email' WHERE id = $id;";  
                mysqli_query($mysqli,$sql);

                echo "<div class='modal-aviso' id = 'modal-aviso'>
                        <div class='modal-aviso-sucesso'>
                            <center>
                                <p>Seus dados foram atualizados com sucesso!</p>";
                echo "          <p><a href='paginainicial.php' class='close-aviso-btn'>Voltar para o início</a><p>
                            </center>
                        </div>
                    </div>";
                }
            }

            elseif($tipo == "funcionario"){}
?>
</body>
</html>
