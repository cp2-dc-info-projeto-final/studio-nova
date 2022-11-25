    <?php
                            include "conecta.php";
                            $email = $_POST['email'];
                            
                            $rash = md5(rand());
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

                            ?>