
<?php

$bdServidor = 'localhost';
$bdUsuario = 'root';
$bdSenha = '';
$bdBanco = 'bd-encontro';

//$bdServidor = 'sql105.epizy.com';
//$bdUsuario = 'epiz_22584800';
//$bdSenha = 'lvbTEqinBii';
//$bdBanco = 'epiz_22584800_encontro';


$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno($conexao)) {
    echo "Problemas para conectar no banco. Verifique os dados!";
    die();
}

function cadastrar_usuario($conexao, $enviar, $endereco){
    $sql = "INSERT INTO usuarios (nome_completo, nome_ident,  data_nasc, sexo, rg, cpf, email, user, senha, telefone, whatsapp, almoco, perfil-cadastro, titulacao, inst_procedencia, instituicao, f_instituicao, telefone_inst, email_inst, tipo) VALUES(
        '{$enviar['nome_completo']}',
        '{$enviar['nome_ident']}',
        '{$enviar['data_nasc']}',
        '{$enviar['sexo']}',
        '{$enviar['rg']}',
        '{$enviar['cpf']}',
        '{$enviar['email']}',
        '{$enviar['user']}',
        '{$enviar['senha']}',
        '{$enviar['telefone']}',
        '{$enviar['whatsapp']}',
        '{$enviar['almoco']}',
        '{$enviar['perfil-cadastro']}',
        '{$enviar['titulacao']}',
        '{$enviar['inst_procedencia']}',
        '{$enviar['instituicao']}',
        '{$enviar['f_instituicao']}',
        '{$enviar['telefone_inst']}',
        '{$enviar['email_inst']}',
        '{$enviar['tipo']}'
    );";
    
    //die($sql);
    mysqli_query($conexao, $sql);
    
    $id_usuario = mysqli_insert_id($conexao);
    
    $sql = "INSERT INTO endereco (id_usuario, rua, bairro, cidade, estado)
    VALUES(
        '{$id_usuario}',
        '{$endereco['rua']}',
        '{$endereco['bairro']}',
        '{$endereco['cidade']}',
        '{$endereco['estado']}'
    );";
    
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function cadastrar_apresentacao($conexao, $enviar){
    $sql = "INSERT INTO trabalho (titulo, pc1, pc2, pc3, resumo, referencias, upload) VALUES( 
       '{$enviar['nome_trabalho']}',  
       '{$enviar['pc1']}', 
       '{$enviar['pc2']}', 
       '{$enviar['pc3']}', 
       '{$enviar['resumo']}', 
       '{$enviar['referencias']}', 
       '{$enviar['upload']}' 
    );";
    
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
    
    $id_trabalho = mysqli_insert_id($conexao);
    $id_usuario = $enviar['id_usuario'];
    
    $sql = "INSERT INTO publica (id_usuario, id_trabalho, data, status, tipo) VALUES(
        '{$id_usuario}',
        '{$id_trabalho}',
        '{$enviar['data']}',
        '{$enviar['situacao']}',
        '{$enviar['tipo']}'
    );";
    
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
    
    return $id_trabalho;
    
}

function cadastrar_autor($conexao, $autor, $instituicao, $id_trabalho){
     $sql = "INSERT INTO autor (nome_autor, instituicao_autor, id_trabalho) VALUES(
            '{$autor}',
            '{$instituicao}',
            '{$id_trabalho}'
        );";
    
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
}

function buscar_apresentacao($conexao){
    $sql = "SELECT t.id_trabalho, t.titulo, p.status, p.tipo FROM trabalho t, publica p WHERE t.id_trabalho = p.id_trabalho;";
    
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function buscar_apresentacao_espec($conexao, $id_u){
    $sql = "SELECT t.id_trabalho, t.titulo, p.status, p.tipo FROM trabalho t, publica p WHERE p.id_usuario = {$id_u} AND t.id_trabalho = p.id_trabalho;";
    
    $resultado = mysqli_query($conexao, $sql)or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function buscar_autores($conexao, $id){
    $sql = "SELECT * FROM autor WHERE id_trabalho = '{$id}';";
    
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
     
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function outras_informacoes($conexao, $id){
    $sql = "SELECT t.titulo, t.referencias, t.pc1, t.pc2, t.pc3, t.resumo, t.upload, p.data, p.status, p.tipo FROM trabalho t, publica p WHERE t.id_trabalho = {$id} AND t.id_trabalho = p.id_trabalho;";
    
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
     
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function atualizar_situacao($conexao, $atualiza){
    $sql = "UPDATE publica SET status = '{$atualiza['situacao'] }' WHERE publica.id_trabalho = {$atualiza['id_trabalho']};";
    
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
}

function enviar_notificacao($conexao, $atualiza){
    $sql = "INSERT INTO notificacao (id_trabalho, notificacao) VALUES(
        '{$atualiza['id_trabalho']}',
        '{$atualiza['observacao']}'
    );";
    
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function buscar_notificacao($conexao, $trabalho){
    $sql = "SELECT * FROM notificacao WHERE id_trabalho = {$trabalho} ORDER BY id_notificacao DESC LIMIT 1 ;";
    
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
     
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function buscar_oficina($conexao){
    $sql = "SELECT * FROM oficina_cad;";
    
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function cadastrar_oficina($conexao, $enviar){
    $sql = "INSERT INTO oficina_cad (titulo, descricao, dia, status) VALUES(
        '{$enviar['titulo']}',
        '{$enviar['descricao']}',
        '{$enviar['dia']}',
        '{$enviar['status']}'
    );";
    
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    
}

function cadastra_participacao_oficina($conexao, $usuario, $oficina){
    $sql="INSERT INTO participacao (id_usuario, oficina) VALUES(
        '{$usuario}',
        '{$oficina}'
    );";
    
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}
?>