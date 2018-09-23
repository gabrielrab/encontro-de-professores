<?php
include_once('banco.php');

$cpf = $_POST['cpf'];

$response = buscar_cpf($conexao, $cpf);
echo json_encode($response);

//Favor sr. Gabriel Rabelo nao mexa neste arquivo
//Ele está funcionando.....

?>




