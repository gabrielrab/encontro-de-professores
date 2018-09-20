<?php
include_once("banco.php");
session_start();

?>
<html>
    <head>
        <title>Cadastrar Apresentação</title>
        <meta charset="utf-8">
        <script type="text/jscript" src="../js/jquery-min.js"></script>
        <script type="text/jscript" src="../js/script.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
        <h1>Cadastrar Trabalho</h1>
    <form id="form-singin" method="POST" action="trabalho-processa.php" enctype="multipart/form-data">
    <!--TESTE-->
<!--    <form id="form-singin" method="GET" action="" enctype="multipart/form-data">-->
       <div class="form-group">
       <input type="text" name="id_usuario" class="form-control" value="<?php  echo $_SESSION['id_usuario']; ?>" hidden>
        <h3>Tipo de Apresentação</h3>
        <select name="tipo" class="form-control" required>
            <option hidden>Selecionar tipo de apresentção</option>
            <option value="1">Oficina</option>
            <option value="0">Trabalho / Poster</option>
        </select>
       </div>
       <div class="form-group">
           <h3>Dados do Trabalho</h3>
           <input type="text" name="nome_trabalho" class="form-control" placeholder="Nome completo do trabalho" required>
           <div id="autores" class="form-inline">
               <input type="text" name="autor[]" class="form-control col-md-6" placeholder="Autor" maxlength="50"><input type="text" name="instituicao_autor[]" class="form-control col-md-6" placeholder="Instituição" maxlength="50">
           </div>
           <a id="add-autor"><i class="fas fa-plus-circle"></i> Novo autor</a>
       </div>
       <div class="form-group">
           <h3>Resumo</h3>
           <textarea name="resumo-text" id="tx-resumo" class="form-control"></textarea>
           <h3>Palavras-chave</h3>
            <div class="form-inline">
                <input type="text" name="pc1" class="form-control" placeholder="Palavra-chave 1" required>
                <input type="text" name="pc2" class="form-control" placeholder="Palavra-chave 2" required>
                <input type="text" name="pc3" class="form-control" placeholder="Palavra-chave 3" required>
            </div>
            <h3>Referências Bibliograficas</h3>
            <textarea name="referencias" class="form-control"></textarea>
            <label><input type="checkbox" id="resumo-file"> Enviar resumo por arquivo</label>
           <input type="file" name="upload" id="resumo" class="form-control" disabled>
       </div>
       <div class="form-group">
           <h3>Termos e condições</h3>
           <small class="form-text text-justify"><input type="checkbox" required> Como apresentador(a) de trabalho e(ou) oficineiro(a), reconheço que o CEFET-MG campus Divinópolis poderá, desde que reconhecida minha autoria, dar ampla divulgação ao mesmo como produção realizada no âmbito do 1º Encontro de Professores de Divinópolis e Região.</small>
           <small class="form-text text-justify"><input type="checkbox" required> Declaro que o conteúdo o trabalho/oficina apresentando/no 1º Encontro de Formação de Professores de Divinópolis e Região é de minha autoria, em colaboração com os coautores mencionados (quando for o caso), da qual assumo qualquer responsabilidade moral e/ou material em virtude de possível impugnação da obra por parte de terceiros.</small>
           <small class="form-text text-justify"><input type="checkbox" required> Estou ciente de que o uso de minha imagem poderá ocorrer para efeitos de divulgação do evento e ou publicação de resultados do mesmo no âmbito midiático e científico.</small>
       </div>
       <div class="form-group">
          <input type="text" name="situacao" class="form-control" value="Trabalho enviado" hidden>
           <button type="submit" class="btn btn-primary" >Cadastrar</button>
       </div>
       <a href="painel-user.php">Voltar</a>
    </form>
</section>
<script>
    $("#add-autor").click(function(){
        $("#autores").append($('<input type="text" name="autor[]" class="form-control col-md-6" placeholder="Autor" maxlength="50"><input type="text" name="instituicao_autor[]" class="form-control col-md-6" placeholder="Instituição" maxlength="50">'));
    });
    
    $("#resumo-file").change(function(){
       if($("#resumo-file").prop("checked", true)){
           $("#resumo").prop("disabled", false);
       } 
        
    });
</script>
</body>
</html>