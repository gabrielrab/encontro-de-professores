<?php
include_once("banco.php");

$user = $_POST['user'];
        
    $query = "SELECT * FROM usuarios WHERE user='$user'";
    $resultado = mysqli_query($conexao, $query);
    $conta = mysqli_num_rows($resultado);
    
    if($conta >= 1){
       echo '<div class="erro"><h1>O usuário já existe !</h1></div>';
        sleep(2);
        header('Location: cadastrar.php');
    } else{
        echo "";
    }

if(isset($_POST['nome_completo']) && $_POST['nome_completo'] != ''){
    $enviar = array();
    
    $enviar['nome_completo'] = $_POST['nome_completo'];
    $enviar['nome_ident'] = $_POST['nome_ident'];
    $enviar['data_nasc'] = $_POST['data_nasc'];
    $enviar['sexo'] = $_POST['sexo'];
    $enviar['rg'] = $_POST['rg'];
    $enviar['cpf'] = $_POST['cpf'];
    $enviar['email'] = $_POST['email'];
    $enviar['user'] = $_POST['user'];
    $enviar['senha'] = $_POST['senha'];
    $enviar['telefone'] = $_POST['telefone'];
    
    if($_POST['whatsapp'] == 'on'){
        $enviar['whatsapp'] = 1;
    } else{
        $enviar['whatsapp'] = 0;
    }
    
    if($_POST['almoco'] == 'on'){
        $enviar['almoco'] = 1;
    } else{
        $enviar['almoco'] = 0;
    }
    
    $enviar['perfil-cadastro'] = $_POST['perfil-cadastro'];
    $enviar['titulacao'] = $_POST['titulacao'];
    
    $enviar['instituicao'] = $_POST['instituicao'];
    $enviar['f_instituicao'] = $_POST['f_instituicao'];
    
    if($_POST['telefone_inst'] != ''){
        $enviar['telefone_inst'] = $_POST['telefone_inst'];
    } else{
        $enviar['telefone_inst'] = 0;
    }
    
    if($_POST['email_inst'] != ''){
        $enviar['email_inst'] = $_POST['email_inst'];
    } else{
        $enviar['email_inst'] = "Nao se aplica";
    }
    
    $enviar['tipo'] = $_POST['tipo'];
    
//    ENDEREÇO
    $endereco = array();
    
    $endereco['rua'] = $_POST['rua'];
    $endereco['complemento'] = $_POST['complemento'];
    $endereco['numero'] = $_POST['numero'];
    $endereco['bairro'] = $_POST['bairro'];
    $endereco['cidade'] = $_POST['cidade'];
    $endereco['cep'] = $_POST['cep'];
    $endereco['estado'] = $_POST['estado'];
    
    $vai = cadastrar_usuario($conexao, $enviar, $endereco);
    echo "<script>alert('Cadastrado com sucesso !');</script>";
    header('Location: painel-user.php');
} else{
    echo "Algo deu errado";
}
?>