<?php
include_once("banco.php");
session_start();

if(!isset($_SESSION['id_usuario'])){
    header('Location: login.php');
} else{
    //
}

?>
<html>
    <head>
        <title>Painel do User</title>
        <meta charset="utf-8">
        <script type="text/jscript" src="../js/jquery-min.js"></script>
        <script type="text/jscript" src="../js/script.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
<body>
<header>
<nav class="navbar">
  <div class="col">
      <img class="logo-header-peq" src="../img/logo-sigev.svg">
  </div>
  <div class="form-inline col-md5">
  <a class="nav-link" href="../datas.php"><b>Datas Importantes</b></a>
  <a class="nav-link" href="../apresentacao-v.php"><b>Formas de Apresentação</b></a>
  <a class="nav-link" href="login.php"><b>Inscrição</b></a>
  <a class="nav-link" href="../programacao.php"><b>Programação</b></a>
  <a class="nav-link" href="../organizacao.php"><b>Organização</b></a>
  <div class="dropdown">
  <button class="dropbtn">Olá, <?php echo $_SESSION['nome_ident'] ?></button>
  <div class="dropdown-content">
    <a href="../index.php">Pagina Inicial</a>
    <a href="perfil.php">Perfil</a>
    <a href="sair.php">Sair</a>
  </div>
</div>
  </div>
</nav>
</header>
<div class="evento">
    <img src="../img/cefet-estagio_1.svg" class="logo-encontro">
    <h5 class="branco">VALORIZANDO PRÁTICAS PEDAGÓGICAS POSITIVAS DE PROMOÇÃO DO LETRAMENTO LITERÁRIO</h5>
</div>
<section class="container">
<!--<h1>Trabalhos Cadastrados</h1><a href="trabalho.php" class="btn btn-primary">Cadastrar Trabalho</a>-->
<!--
<table class="table">
   <thead>   
    <tr>
        <th>Titulo</th>
        <th>Forma de Apresentação</th>
        <th>Status</th>
        <th>Observações</th>
    </tr>
   </thead>
   <tbody>
      <tr>   
       <?php
//          $id_u = $_SESSION['id_usuario'];
//              
//          $recebe = buscar_apresentacao_espec($conexao, $id_u);
//          foreach($recebe as $vai):
       ?>
        <td hidden><?php// $trabalho =  $vai['id_trabalho']; ?></td>
        <td><?php //echo $vai['titulo']; ?></td>
        <td><?php //if($vai['tipo'] == 0){ echo "Trabalho(Poster)";} else{ echo "Oficina"; } ?></td>
        <td><?php //echo $vai['status']; ?></td>
        <td>
        <?php 
//          $noti = buscar_notificacao($conexao, $trabalho);
//            foreach($noti as $passa){
//                echo $passa['notificacao'];
//            }  
        ?>
        </td>
      </tr>
      <?php
       //endforeach;
       ?>
   </tbody>
</table>
*/
-->

<h1>Oficinas</h1><a href="oficinas.php" class="btn btn-primary">Cadastrar Oficina</a>
<table class="table">
   <thead>   
    <tr>
        <th>Id Oficina</th>
        <th>Nome da Oficina</th>
    </tr>
   </thead>
   <tbody>
      <tr>   
       <?php
          $id = $_SESSION['id_usuario'];
              
          $recebe = buscar_participacao($conexao, $id);
          foreach($recebe as $vem):
       ?>
        <td><?php echo $vem['id_oficina']; ?></td>
        <td><?php echo utf8_encode($vem['oficina']); ?></td>
      </tr>
      <?php
       endforeach;
       ?>
   </tbody>
</table>
</section>
</body>
</html>