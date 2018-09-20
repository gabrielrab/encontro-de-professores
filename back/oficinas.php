<?php
include_once("banco.php");
session_start();

?>
<html>
    <head>
        <title>Cadastrar Oficinas</title>
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
    <h1>Cadastrar participação em Oficinas</h1>
    <div class="oficinas form-group">
       
        <?php
        
        $id = $_SESSION['id_usuario'];
        
        $recebe = buscar_oficina_menos($conexao, $id);
        foreach($recebe as $vai):
        ?>
        <form action="" method="POST"
        <?php
            $oficina = $vai['id_oficina'];
            
            $tenta = buscar_cadastro($conexao, $id, $oficina);
            
            foreach($tenta as $teste){
                if($teste['count'] > 0){
                    echo "hidden";
                }
            }
        ?> > <!--FECHAMENTO DO FORM !-->
         <div class="form-control box">
            <input type="number" value="<?php echo utf8_encode($vai['id_oficina']); ?>" name="id_oficina" hidden>
            <input type="text" value="<?php echo $vai['titulo']; ?>" name="oficina" hidden>
             <h5><?php echo  utf8_encode($vai['titulo']); ?></h5>
             <h6>Responsável: <?php echo utf8_encode($vai['responsavel']); ?> (<?php echo utf8_encode($vai['instituicao']); ?>)</h6>
             <p class="form-text text-justify"><?php echo utf8_encode($vai['descricao']); ?></p>
             <h6>Dados:</h6>
             <p><?php echo $vai['dia']; ?></p>
             <p>Status: <b><?php 
                 $buscar = contar_participacao($conexao, $vai['id_oficina']);
                 
                 foreach($buscar as $aqui):
                     if($aqui['count'] >= 25){
                         $_SESSION['erro'] = true;
                         echo "Lotada";
                     } else{
                         echo "Disponivel";
                     }
            ?></b></p>
             <button type="submit" class="btn btn-primary" <?php if(isset($_SESSION['erro']) && $_SESSION['erro'] == true){ echo "disabled"; $_SESSION['erro'] = false;} endforeach; ?> >Participar</button>
         </div>
       </form>
         <?php
        endforeach;
        ?>
    <?php
        if(isset($_POST['id_oficina'])){
            $inserir = array();
                    
            $inserir['id_usuario'] = $_SESSION['id_usuario'];
            $inserir['id_oficina'] = $_POST['id_oficina'];
            $inserir['oficina'] = $_POST['oficina'];
            
            $cad = cadastra_participacao_oficina($conexao, $inserir);
                 echo '<script>alert("Cadastro Realizado");</script>';
            }
        ?>
    </div>
       <a href="painel-user.php">Voltar</a>
</section>
<!--
<script>
    $(".click").change(function(){
       var valor = $(this).val();
        
       $("#add_oficinas").append($('<input type="text" class="form-control" name ="oficina[]" placeholder="'+ valor +'" value="'+ valor +'">'));
    });
</script>
-->
</body>
</html>