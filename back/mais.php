<?php
include_once("banco.php");
session_start();

if(!isset($_SESSION['id_usuario'])){
    header('Location: login.php');
} else{
    $id = $_GET['id'];
        
    $vem = outras_informacoes($conexao, $id);
    foreach($vem as $reb){
        $titulo = $reb['titulo'];
        $pc1 = $reb['pc1'];
        $pc2 = $reb['pc2'];
        $pc3 = $reb['pc3'];
        $resumo = $reb['resumo'];
        $upload = $reb['upload'];
        $data = $reb['data'];
        $status = $reb['status'];
        $tipo = $reb['tipo'];
        $referencias = $reb['referencias'];
    }
}
?>
<html>
    <head>
        <title>Adm Publicação</title>
        <meta charset="utf-8">
        <script type="text/jscript" src="../js/jquery-min.js"></script>
        <script type="text/jscript" src="../js/script.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
<a href="painel.adm.php" class="btn btn-primary">Voltar</a>
<a href="sair.php" class="btn btn-danger">Sair</a>
<h1>Dados do trabalho</h1>
<div class="row">
    <div class="col">
      <div class="form-group">
        <h4>Tipo de Apresentação</h4>
        <span><?php if($reb['tipo'] == 0){ echo "Trabalho(Poster)";} else{ echo "Oficina"; } ?></span>
            <h4>Dados do Trabalho</h4>
            <span class="trabalho-inf"><b>Titulo: </b><?php echo $titulo; ?></span><br>
            <span><b>Status: </b><?php echo $status ?></span>
                <div id="autores" class="form-inline">
                    <span class="trabalho-inf"><b>Autores: </b>
                    <?php 
                        $recebe = buscar_autores($conexao, $id);
                
                        foreach($recebe as $aqui){
                    echo $aqui['nome_autor']." (".$aqui['instituicao_autor'].") ";
                }
            ?>
                </span>
            </div>
    <h4>Resumo</h4>
    <textarea name="resumo-text" id="tx-resumo" class="form-control" disabled <?php if($resumo == 'null'){ echo 'hidden'; }?>>
    <?php echo $resumo; ?></textarea>
    <a href="uploads/<?php echo $upload; ?>" download <?php if($upload == ''){ echo 'hidden'; }?> class="btn btn-success">Download</a>
    <h4>Palavras-chave</h4>
    <div class="form-inline">
        <input type="text" name="pc1" class="form-control" placeholder="Palavra-chave 1" disabled value="<?php echo $pc1;?>">
        <input type="text" name="pc2" class="form-control" placeholder="Palavra-chave 2" disabled value="<?php echo $pc2;?>">
        <input type="text" name="pc3" class="form-control" placeholder="Palavra-chave 3" disabled value="<?php echo $pc3;?>">
    </div>
    <h4>Referencias</h4>
    <textarea name="resumo-text" id="tx-resumo" class="form-control" disabled <?php if($referencias == 'null'){ echo 'hidden'; }?>>
    <?php echo $referencias; ?></textarea>
    </div>
</div>
    <div class="col-5 form-control">
        <h1>Opções do trabalho</h1>
         <a href="" id="alt-situacao"><i class="fas fa-plus-circle"></i> Alterar Situação</a>
         <div class="form-group">
             <form action="" method="POST">
                <input type="text" hidden name="id_trabalho" value="<?php echo $id; ?>">
                 <select name="situacao" class="form-control">
                     <option hidden>Selecionar situação</option>
                     <option>Em análise</option>
                     <option>Realizar Alterações</option>
                     <option>Aprovado</option>
                     <option>Reprovado</option>
                 </select>
                     <input type="submit" class="btn btn-primary" name="envia-att">
                     <a href="" class="btn btn-danger" id="btn-cancelar">Cancelar</a>
             </form>
             <?php
                if(isset($_POST['envia-att'])){
                    $atualiza = array();
                    
                    $atualiza['id_trabalho'] = $id;
                    $atualiza['situacao'] = $_POST['situacao'];
                    
                    $att = atualizar_situacao($conexao, $atualiza);
                    
                    echo "Atualizado com sucesso";
                }
             ?>
         </div>
         <div class="form-group">
            <form action="" method="POST">   
             <h4>Observações</h4>
             <input type="text" hidden name="id_trabalho" value="<?php echo $id; ?>">
             <textarea class="form-control" name="observacao"></textarea>
             <input type="submit" class="btn btn-primary" name="envia-obs">
            </form>
            <?php
                if(isset($_POST['envia-obs'])){
                    $atualiza = array();
                    
                    $atualiza['id_trabalho'] = $id;
                    $atualiza['observacao'] = $_POST['observacao'];
                    
                    $att = enviar_notificacao($conexao, $atualiza);
                    
                    echo "Enviado com sucesso";
                }
             ?>
         </div>
    </div>
</div>
</section>
</body>
</html>