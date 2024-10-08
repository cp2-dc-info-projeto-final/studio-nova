<?php 

 include "autentica.php";
 include "conecta.php";

 if($tipo == "cliente"){
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM usuario WHERE id = $id;"; 
    $res = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($res);
    $nome = $usuario['nome'];
    $sobrenome = $usuario['sobrenome'];


echo"<html>
    <!DOCTYPE html>
    <html lang='en'>
    <head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/nova.css'>
    <title>Página inicial</title>
      </head>
       <body>
       <nav>
            <a  href='#mySidenav' onclick=\"javascript:document.getElementById('mySidenav').style.visibility = 'visible';\">     
            <svg id='sidebar-btn' xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor'class='bi bi-list' viewBox='0 0 16 16'>
                <path fill-rule='evenodd' d='M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z'/>
            </svg>
                </a>
                <a class='logo' href='paginainicial.php'><img id='logo-nav' src='img/logo.png' alt=''></a>
                <h1>SEUS DADOS:</h1>
        </nav>
        <div class='sidebar' id='mySidenav'>
                <a href='javascript:void(0)' class='close-sidebar' onclick=\"javascript:document.getElementById('mySidenav').style.visibility = 'hidden';\" >&times;</a>
                    <a href='paginainicial.php'>
                        <span class='icon'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-house' viewBox='0 0 16 16'>
                                <path fill-rule='evenodd' d='M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z'/>
                                <path fill-rule='evenodd' d='M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z'/>
                            </svg>
                        </span>
                        <span class='title'>Início</span> 
                    </a>
                    <a href='editusu.php'>
                        <span class='icon'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16'>
                                <path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z'/>
                            </svg>
                        </span>
                        <span class='title'>Meu perfil</span> 
                    </a>
                    <a href='agendamentos.php'>
                    <span class='icon'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-folder' viewBox='0 0 16 16'>
                            <path d='M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z'/>
                        </svg>
                    </span>
                    <span class='title'>Meus agendamentos</span> 
                </a>
                    <a href='#botao-confirma2'  onclick=\"javascript:document.getElementById('botao-confirma2').style.visibility = 'visible';\">
                        <span class='icon'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-left' viewBox='0 0 16 16'>
                                <path fill-rule='evenodd' d='M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z'/>
                                <path fill-rule='evenodd' d='M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z'/>
                            </svg>
                        </span>
                        <span class='title'>Sair</span> 
                    </a>
                </div>

     <div class='conteudo-editar'> 
       <div class='container-editar'>
            <div class='header-editar'>
                <h2>Editar seu dados:</h2>
            </div>
                        <form action='atualizar.php' method='POST'>
                            
                            <input type='hidden' name='id_fun' value='0'>
                            <input type='hidden' name='id' value='$id'>

                                <div class='input-group w50'>
                                    <label for='nome'>Nome</label>
                                    <input type='text' name='nome' placeholder=' Digite aqui seu nome' required value='$nome' >
                                </div>

                                <div class='input-group w50'>
                                    <label for='sobrenome'>Sobrenome</label>
                                    <input type='text' name='sobrenome' placeholder=' Digite aqui seu sobrenome' required value= '$sobrenome' >
                                </div>
                        
                                <div class='input-group'>
                                    <label for='email'>Informe seu e-mail</label>
                                    <input type='text' name='email' placeholder=' Digite aqui seu email' title='formato' pattern='[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$' required value='$email'>
                                </div>
                                <center>
                                    <a href='#botao-confirma' onclick=\"javascript:document.getElementById('botao-confirma').style.visibility = 'visible';\" >Editar</a>
                                </center>
        </div>
    </div>          
                                <div id='botao-confirma' class='confirma'>
                                    <div class='confirma-conteudo'>
                                        <h1>Insira sua senha para confirmar a edição</h1><br>
                                            <div class='input-group'>
                                                <label for='senha'>Confirme a senha</label>
                                                <input type='password' name='senha' placeholder=' Confirme aqui sua senha' title='formato'>
                                            </div>
                                        <input type='submit' class='btn' value='Editar dados'>
                                        <center>
                                        <br><a href=\"javascript:void(0)\" onclick=\"javascript:document.getElementById('botao-confirma').style.visibility = 'hidden';\">Cancelar</a>
                                        </center>
                                    </div>
                                </div>
                            </form>
                
                            <div id='botao-confirma2' class='confirma2'>
                                <div class='confirma-conteudo'>
                                    <h1>Tem certeza que encerrar sua sessão?</h1><br>
                                    <a href='logout.php' class='btn1'>SIM</a>
                                    <a class='btn-cancelar' onclick=\"javascript:document.getElementById('botao-confirma2').style.visibility = 'hidden'\">Cancelar</a>
                                </div>
                            </div>
        
</body>
</html>";
}

elseif($tipo == "funcionario"){

    $nome = $_SESSION['nome'];
    $cpf = $_SESSION['cpf'];
    $tel = $_SESSION['tel'];
    $sql ="SELECT * FROM funcionario WHERE email = '$email';";
    $res = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($res);
    $id = $usuario["id_funcionario"];
    


echo"<html>
    <!DOCTYPE html>
    <html lang='en'>
    <head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/nova.css'>
    <title>Página inicial</title>
      </head>
       <body>
       <nav>
            <a  href='#mySidenav' onclick=\"javascript:document.getElementById('mySidenav').style.visibility = 'visible';\">     
            <svg id='sidebar-btn' xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor'class='bi bi-list' viewBox='0 0 16 16'>
                <path fill-rule='evenodd' d='M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z'/>
            </svg>
                </a>
                <a class='logo' href='agendamentos.php'><img id='logo-nav' src='img/logo.png' alt=''></a>
        </nav>
        <div class='sidebar' id='mySidenav'>
                <a href='javascript:void(0)' class='close-sidebar' onclick=\"javascript:document.getElementById('mySidenav').style.visibility = 'hidden';\" >&times;</a>
                    <a href='agendamentos.php'>
                        <span class='icon'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-house' viewBox='0 0 16 16'>
                                <path fill-rule='evenodd' d='M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z'/>
                                <path fill-rule='evenodd' d='M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z'/>
                            </svg>
                        </span>
                        <span class='title'>Início</span> 
                    </a>
                    <a href='editusu.php'>
                        <span class='icon'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16'>
                                <path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z'/>
                            </svg>
                        </span>
                        <span class='title'>Meu perfil</span> 
                    </a>
                    <a href='#botao-confirma2'  onclick=\"javascript:document.getElementById('botao-confirma2').style.visibility = 'visible';\">
                        <span class='icon'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-left' viewBox='0 0 16 16'>
                                <path fill-rule='evenodd' d='M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z'/>
                                <path fill-rule='evenodd' d='M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z'/>
                            </svg>
                        </span>
                        <span class='title'>Sair</span> 
                    </a>
                </div>

     <div class='conteudo-editar'> 
       <div class='container-editar'>
            <div class='header-editar'>
                <h2>Editar seus dados:</h2>
            </div>
                        <form action='atualizar.php' method='POST'>
                            
                            <input type='hidden' name='id' value='$id'>

                                <div class='input-group'>
                                    <label for='nome'>Nome</label>
                                    <input type='text' name='nome' placeholder=' Digite aqui seu nome' required value='$nome'>
                                </div>

                                <div class='input-group'>
                                    <label for='cpf'>CPF</label>
                                    <input type='text' name='cpf' placeholder=' Digite aqui seu nome' required value='$cpf'>
                                </div>

                                <div class='input-group'>
                                    <label for='tel'>Telefone</label>
                                    <input type='text' name='tel' placeholder=' Digite aqui seu nome' required value='$tel'>
                                </div>

                                <div class='input-group'>
                                    <label for='email'>Informe seu e-mail</label>
                                    <input type='text' name='email' placeholder=' Digite aqui seu email' title='formato' pattern='[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$' required value='$email'>
                                </div>
                                <center>
                                    <button type='submit' >Editar</button>
                                </center>
        </div>
    </div>          
                            </form>
                
                            <div id='botao-confirma2' class='confirma2'>
                                <div class='confirma-conteudo'>
                                    <h1>Tem certeza que encerrar sua sessão?</h1><br>
                                    <a href='logout.php' class='btn1'>SIM</a>
                                    <a class='btn-cancelar' onclick=\"javascript:document.getElementById('botao-confirma').style.visibility = 'hidden'\">Cancelar</a>
                                </div>
                            </div>
        
</body>
</html>";
}


elseif ($tipo == "administrador") {

    echo"<html>
    <!DOCTYPE html>
    <html lang='en'>
    <head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/nova.css'>
    <title>Página inicial</title>
      </head>
       <body>";
       
        if(isset($_GET["id_cliente"]) && $_GET["id_cliente"] != ""){
        
            if ($mysqli->connect_errno) {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
            }
    
            $id = $_GET["id_cliente"];
            $sql = "SELECT * FROM usuario WHERE id = '$id';"; 
            $res = mysqli_query($mysqli,$sql);
            $usuario = mysqli_fetch_array($res);
            $nome = $usuario['nome'];
            $sobrenome = $usuario['sobrenome'];
            $email = $usuario['email'];

            echo"<nav>
       <a href='listacli.php'><svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-arrow-left' viewBox='0 0 16 16'>
           <path fill-rule='evenodd' d='M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z'/>
           </svg>
       </a>
       <a class='logo' href='administracao.php'><img id='logo-nav' src='img/logo.png' alt=''></a>
       <ul class='nav-list'>
           <h1>Dados de $nome</h1>        
       </ul>
        </nav><div class='sidebar' id='mySidenav'>
        <a href='javascript:void(0)' class='close-sidebar' onclick=\"javascript:document.getElementById('mySidenav').style.visibility = 'hidden';\" >&times;</a>
            <a href='paginainicial.php'>
                <span class='icon'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-house' viewBox='0 0 16 16'>
                        <path fill-rule='evenodd' d='M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z'/>
                        <path fill-rule='evenodd' d='M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z'/>
                    </svg>
                </span>
                <span class='title'>Início</span> 
            </a>
            <a href='editusu.php'>
                <span class='icon'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16'>
                        <path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z'/>
                    </svg>
                </span>
                <span class='title'>Meu perfil</span> 
            </a>
            <a href='agendamentos.php'>
            <span class='icon'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-folder' viewBox='0 0 16 16'>
                    <path d='M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z'/>
                </svg>
            </span>
            <span class='title'>Meus agendamentos</span> 
        </a>
            <a href='#botao-confirma2'  onclick=\"javascript:document.getElementById('botao-confirma2').style.visibility = 'visible';\">
                <span class='icon'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-left' viewBox='0 0 16 16'>
                        <path fill-rule='evenodd' d='M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z'/>
                        <path fill-rule='evenodd' d='M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z'/>
                    </svg>
                </span>
                <span class='title'>Sair</span> 
            </a>
        </div>

<div class='conteudo-editar'> 
<div class='container-editar'>
    <div class='header-editar'>
        <h2>Editar seu dados:</h2>
    </div>
                <form action='atualizar.php' method='POST'>
                    
                    <input type='hidden' name='id_fun' value='0'>
                    <input type='hidden' name='id' value='$id'>

                        <div class='input-group w50'>
                            <label for='nome'>Nome</label>
                            <input type='text' name='nome' placeholder=' Digite aqui seu nome' required value='$nome' >
                        </div>

                        <div class='input-group w50'>
                            <label for='sobrenome'>Sobrenome</label>
                            <input type='text' name='sobrenome' placeholder=' Digite aqui seu sobrenome' required value= '$sobrenome' >
                        </div>
                
                        <div class='input-group'>
                            <label for='email'>Informe seu e-mail</label>
                            <input type='text' name='email' placeholder=' Digite aqui seu email' title='formato' pattern='[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$' required value='$email'>
                        </div>
                        <center>
                            <button href='atualizar.php' type='submit'>Editar</button>
                        </center>
</div>
</div>          
                    </form>
        
                    <div id='botao-confirma2' class='confirma2'>
                        <div class='confirma-conteudo'>
                            <h1>Tem certeza que encerrar sua sessão?</h1><br>
                            <a href='logout.php' class='btn1'>SIM</a>
                            <a class='btn-cancelar' onclick=\"javascript:document.getElementById('botao-confirma2').style.visibility = 'hidden'\">Cancelar</a>
                        </div>
                    </div>

</body>
</html>";
            
        } 
    
        if(isset($_GET["id_funcionario"]) && $_GET["id_funcionario"] != ""){
        
            $id = $_GET["id_funcionario"];
            $sql = "SELECT * FROM funcionario WHERE id_funcionario = '$id';"; 
            $res = mysqli_query($mysqli,$sql);
            $usuario = mysqli_fetch_array($res);
            $nome = $usuario['nome'];
            $cpf = $usuario['cpf'];
            $tel = $usuario['tel'];
            $email = $usuario['email'];

            echo"<nav>
       <a href='listafun.php'><svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-arrow-left' viewBox='0 0 16 16'>
           <path fill-rule='evenodd' d='M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z'/>
           </svg>
       </a>
       <a class='logo' href='administracao.php'><img id='logo-nav' src='img/logo.png' alt=''></a>
       <ul class='nav-list'>
           <h1>Dados de $nome</h1>        
       </ul>
        </nav>
        <div class='sidebar' id='mySidenav'>
                <a href='javascript:void(0)' class='close-sidebar' onclick=\"javascript:document.getElementById('mySidenav').style.visibility = 'hidden';\" >&times;</a>
                    <a href='agendamentos.php'>
                        <span class='icon'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-house' viewBox='0 0 16 16'>
                                <path fill-rule='evenodd' d='M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z'/>
                                <path fill-rule='evenodd' d='M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z'/>
                            </svg>
                        </span>
                        <span class='title'>Início</span> 
                    </a>
                    <a href='editusu.php'>
                        <span class='icon'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16'>
                                <path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z'/>
                            </svg>
                        </span>
                        <span class='title'>Meu perfil</span> 
                    </a>
                    <a href='#botao-confirma2'  onclick=\"javascript:document.getElementById('botao-confirma2').style.visibility = 'visible';\">
                        <span class='icon'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-left' viewBox='0 0 16 16'>
                                <path fill-rule='evenodd' d='M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z'/>
                                <path fill-rule='evenodd' d='M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z'/>
                            </svg>
                        </span>
                        <span class='title'>Sair</span> 
                    </a>
                </div>

     <div class='conteudo-editar'> 
       <div class='container-editar'>
            <div class='header-editar'>
                <h2>Editar seus dados:</h2>
            </div>
                        <form action='atualizar.php' method='POST'>
                            
                            <input type='hidden' name='id' value='0'>
                            <input type='hidden' name='id_fun' value='$id'>

                                <div class='input-group'>
                                    <label for='nome'>Nome</label>
                                    <input type='text' name='nome' placeholder=' Digite aqui seu nome' required value='$nome'>
                                </div>

                                <div class='input-group'>
                                    <label for='cpf'>CPF</label>
                                    <input type='text' name='cpf' placeholder=' Digite aqui seu cpf' required value='$cpf'>
                                </div>

                                <div class='input-group'>
                                    <label for='tel'>Telefone</label>
                                    <input type='text' name='tel' placeholder=' Digite aqui seu telefone' required value='$tel'>
                                </div>

                                <div class='input-group'>
                                    <label for='email'>Informe seu e-mail</label>
                                    <input type='text' name='email' placeholder=' Digite aqui seu email' title='formato' pattern='[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$' required value='$email'>
                                </div>
                                <center>
                                    <button href='atualizar.php' type='submit' >Editar</button>
                                </center>
        </div>
    </div>          
                                <div id='botao-confirma' class='confirma'>
                                    <div class='confirma-conteudo'>
                                        <h1>Insira sua senha para confirmar a edição</h1><br>
                                            <div class='input-group'>
                                                <label for='senha'>Confirme a senha</label>
                                                <input type='password' name='senha' placeholder=' Confirme aqui sua senha' title='formato'>
                                            </div>
                                        <input type='submit' class='btn' value='Editar dados'>
                                        <center>
                                        <br><a href=\"javascript:void(0)\" onclick=\"javascript:document.getElementById('botao-confirma').style.visibility = 'hidden';\">Cancelar</a>
                                        </center>
                                    </div>
                                </div>
                            </form>
                
                            <div id='botao-confirma2' class='confirma2'>
                                <div class='confirma-conteudo'>
                                    <h1>Tem certeza que encerrar sua sessão?</h1><br>
                                    <a href='logout.php' class='btn1'>SIM</a>
                                    <a class='btn-cancelar' onclick=\"javascript:document.getElementById('botao-confirma').style.visibility = 'hidden'\">Cancelar</a>
                                </div>
                            </div>
        
</body>
</html>";
        }    
}
?>