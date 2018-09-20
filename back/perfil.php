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
        <title>Perfil</title>
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
<div class="form-group">    
    <h3>Dados do Usuário</h3>
    <h5>Nome: <?php echo $_SESSION['nome_completo']; ?></h5>
    <h5>Nome de Usuário: <?php echo $_SESSION['user']; ?></h5>
    <h5>Perifil de Cadastro: <?php echo $_SESSION['perfil_cadastro']; ?></h5>
</div>
</section>
</body>
</html>