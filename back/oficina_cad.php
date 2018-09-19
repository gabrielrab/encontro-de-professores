<?php
include_once("banco.php");
session_start();

?>
<html>
    <head>
        <title>Cadastrar Oficinas</title>
        <script type="text/jscript" src="../js/jquery-min.js"></script>
        <script type="text/jscript" src="../js/script.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
<body>
<header>
<nav class="nav">
  <div class="col">
      <img class="logo-header-peq" src="../img/logo-sigev.svg">
  </div>
  <div class="form-inline col-md5">
  <a class="nav-link" href="../datas.php"><b>Datas Importantes</b></a>
  <a class="nav-link" href="../apresentacao-v.php"><b>Formas de Apresentação</b></a>
  <a class="nav-link" href="login.php"><b>Inscrição</b></a>
  <a class="nav-link" href="../programacao.php"><b>Programação</b></a>
  <a class="nav-link" href="../organizacao.php"><b>Organização</b></a>
  </div>
</nav>
</header>
<div class="evento">
    <img src="../img/cefet-estagio_1.svg" class="logo-encontro">
    <h5 class="branco">VALORIZANDO PRÁTICAS PEDAGÓGICAS POSITIVAS DE PROMOÇÃO DO LETRAMENTO LITERÁRIO</h5>
</div>
<section class="container">
<h1>Cadastrar Oficinas</h1>
<div class="col-6">
    <form action="oficina_cad_processa.php" method="POST" class="form-login">
    <input type="text" name="titulo" class="form-control" placeholder="Titulo da oficina" required>
    <div class="form-inline">
        <input type="text" class="form-control col" name="responsavel" placeholder="Responsável" required>
        <input type="text" class="form-control col" name="formacao" placeholder="Formação" required>
    </div>
        <input type="text" class="form-control" name="instituicao" required placeholder="Instituição">
    <h5>Descrição</h5>
    <textarea name="descricao" class="form-control"></textarea>
    <input type="date" class="form-control" name="data" required>
    <select name="status" class="form-control" required>
        <option hidden>Selecionar status</option>
        <option>Disponivel</option>
        <option>Lotada</option>
        <option>Indisponivel</option>
    </select>
    <div class="form-inline">
        <input type="submit" class="btn btn-success" name="enviar">
        <a href="painel.adm.php" class="btn btn-primary">Voltar</a>
    </div>
</form>
</div>
</section>
</body>
</html>