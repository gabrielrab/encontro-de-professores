    <?php
        include_once("banco.php");
        session_start(); //inicia a sessao
        //se clicou em enviar
        if(isset($_POST['user'])){
            //cria um array para salvar os dados
            $usuario = array();
            //pega user e senha...
            $usuario['user'] = $_POST['user'];
            $usuario['senha'] = $_POST['senha'];
            //busca no banco se existe algum registro com user e senha passados COM LIMIT DE 1
            $sqlBusca = "SELECT * FROM usuarios WHERE user ='{$usuario['user']}' AND senha='{$usuario['senha']}' LIMIT 1";
            //Associa o resultado a variavel
            $resultado = mysqli_query($conexao, $sqlBusca);
            $resultado = mysqli_fetch_assoc($resultado);
            
            if(isset($resultado)){
                //Salva um uma sessao os dados do usuario
                $_SESSION['id_usuario'] = $resultado['id_usuario'];
                $_SESSION['nome_ident'] = $resultado['nome_ident'];
                $_SESSION['user'] = $resultado['user'];
                $_SESSION['senha'] = $resultado['senha'];
                $_SESSION['tipo'] = $resultado['tipo'];
                $_SESSION['nome_completo'] = $resultado['nome_completo'];
                $_SESSION['user'] = $resultado['user'];
                $_SESSION['perfil_cadastro'] = $resultado['perfil_cadastro'];
                
                
                if($_SESSION['tipo'] == '2'){
                      
                    header('Location: painel.adm.php');
                } else{
        
                    header('Location: painel-user.php');
                }
                                
            } else{
                //Deu errado
                echo "Senha errada";
                sleep(4);
                echo "<script>alert('Senha Errada');</script>";
                header('Location: login.php');
            }
            
            
            
            
        } else{
            //echo "Estamos com alguns problemas...";
        }
    ?>