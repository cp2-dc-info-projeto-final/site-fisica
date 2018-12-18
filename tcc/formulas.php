<!DOCTYPE html>
<?php
require_once('modelo/tabelauploadfor.php');
require_once('modelo/tabelausuario.php');
require_once('modelo/tabelaassunto.php');

session_start();

  $listaupload = [];
	if (array_key_exists('errosformulas', $_SESSION))
	{
		$erros = $_SESSION['errosformulas'];
		unset($_SESSION['errosformulas']);
	}
	else
	{
		$erros = null;
	}


  	if (array_key_exists('username', $_SESSION) &&
      array_key_exists('idUsuárioConectado', $_SESSION) )
  	{

    	$user_name = $_SESSION['username'];
    	$id = $_SESSION['idUsuárioConectado'];
    	
    	$master = BuscaUsuarioPorId($id);

  	}
    else
  	{
    	header('Location:login.php');
  	}
?>



<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulas</title>
  <link rel="stylesheet" type="text/css" href="styleFor_1.css">
</head>
<body>

<div id="D1">
<div class="logo"><img src="images/hig.jpg" class="escola" ></div>
    
      <div class="prof">
      <br>
     <br>
          <?php if($master['matricula'] != null){ ?>
            <?php echo $user_name; ?>
             <a class = "linkpi" href="cadastroprof.php"> <button id="CadButton" > Fazer o Cadastro </button> </a>
                   <?php } ?>
      <br>
            <a href="controlador/sair.php"> <button id="Button" > Sair </button> </a>
      </div>
    </div>
      <ul>
          <li><a class="a"  href="paginInc.php">Home</a></li>
          <li><a class="a" id="a" href="formulas.php">Formulas</a></li>
          <li><a class="a" href="exercicios.php">exercicios</a></li>
          <li><a class="a" href="videos.php">Videos</a></li>
      </ul>

    <?php if ($erros != null) { ?>
       <div class="alertalert-warning">
          <ul>
            <?php foreach ($erros as $erro) { ?>
              <li> <?= $erro ?> </li>
            <?php } ?>
          </ul>
       </div>
    <?php } ?>

<h1> Cadastrar Fórmulas </h1>

    <!-- Cadastro de assuntos: -->
		<?php if($master['matricula'] != null){ ?>

			<form name="assuntonovo" method="post" action ="controlador/assuntos.php" >
				<input type="text" name="nome">
				<input type="submit" value="Criar">
			</form>

		<?php } ?>



		<?php if(empty(ListaAssuntos($id)) ){ 		  	  
     echo "Sem assuntos";?>

    <?php } else {
        $listaassuntos = ListaAssuntos($id);
        foreach ($listaassuntos as $ass) { ?>
           <div class="box">
              <a href="?ass=<?php $ass['id']?>"><?= $ass['nome']?></a>
               </a><?php if($master['matricula'] != null && $ass != false){ ?>
                            <form class="delete" action="controlador/removerass.php" method="POST">
                            <input name="id" type="hidden" value="<?= $ass['id'] ?>">
                            <input type="submit" value="Remover" class="btn btn-sm btn-outline-danger">
                          </form>
                            <?php } ?>
                          <?php if($master['matricula'] != null && $ass != false){ ?>
                            <form action ="controlador/uploadfor.php" method  ="POST"  enctype="multipart/form-data">
                              <input name="ass" value="<?= $ass['id']?>" type="hidden">
                              <input type="file" name = "arquivo"><br>
                              <input type="submit" name="enviar-lista">
                            </form>
                          <?php } ?>
              <br>
                          <?php $listaupload = ListadeUpload($ass['id']); ?>
                          <?php foreach ($listaupload as $Upload) { ?>     

                            <div class="lista">  <a href="<?= $Upload['arquivo'] ?>"><?= $Upload['nome']?>
                            
                           </a><?php if($master['matricula'] != null && $ass != false){ ?>
                            <form class="delete" action="controlador/removerupfor.php" method="POST">
                            <input name="idUpload" type="hidden" value="<?= $Upload['id'] ?>">
                            <input type="submit" value="Remover" class="btn btn-sm btn-outline-danger">
                          </form>
                            <?php } ?></div> 
                            
                  <?php } ?>


          
            </div>
            <?php if ($ass['id']) { ?>
            <?php }?>
		    <?php } ?>
    <?php } ?>

 
</body>
</html>
