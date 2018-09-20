<?php
header('Content-Type: text/html; charset=utf-8');
include_once("banco.php");
session_start();

date_default_timezone_set('America/Sao_Paulo');

if(isset($_POST['enviar'])){
    $enviar = array();
    
    $enviar['titulo'] = $_POST['titulo'];
    $enviar['responsavel'] = $_POST['responsavel'];
    $enviar['formacao'] = $_POST['formacao'];
    $enviar['instituicao'] = $_POST['instituicao'];
    $enviar['descricao'] = $_POST['descricao'];
    $enviar['dia'] = $_POST['data'];
    $enviar['status'] = $_POST['status'];
 
    
    cadastrar_oficina($conexao, $enviar);
    
    header('Location: oficina_cad.php');
    
} else{
    echo "Algo deu errado";
}
?>