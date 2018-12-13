<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulas</title>
  <link rel="stylesheet" type="text/css" href="styleFor_1.css">
</head>
<body>
	<div id="D1">
        <?php

require_once('modelo/tabelausuario.php');
require_once('modelo/tabelaupload.php');

session_start();

  $ass = null;
  $listauploadfor = [];
  $listaupload = [];

  if (array_key_exists('username', $_SESSION) &&
      array_key_exists('idUsuárioConectado', $_SESSION))
  {

    $id = $_SESSION['idUsuárioConectado'];
    $master = BuscaUsuarioPorId($id);
    $user_name = $_SESSION['username'];
    


    $usuario = BuscaUsuarioPorId($id);
    if (array_key_exists('ass', $_REQUEST))
    {
      $ass = filter_var($_REQUEST['ass'], FILTER_VALIDATE_INT);
      $listauploadfor = ListadeUpload($ass);
    }
  }
  else
  {
    $usuario = null;
    header('Location:login.php');
  }
?>





<div class="logo"><img src="images/hig.jpg" class="escola" ></div>
    
      <div class="prof">
      <br>
     <br>
          <?php if($usuario['matricula'] != null){ ?>
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
<br>
<br>




		<?php if($master['matricula'] != null){ ?>
			<form action ="formulas.php" method="POST" enctype="multipart/form-data">
				<input type="text" name="assunto">
				<input type="submit" value="Criar">
			</form>
		<?php } ?>
    

    <?php foreach ($listauploadfor as $Uploadfor) { ?>
       <div class="box">
            </div>
              <?php if ($ano == 2) { ?>
                <div id="popup2" class="overlay">
                  <div class="popup">
                    </div>
                  </div>
                </div>
              <?php } ?>            
    <?php } ?>
    

    <?php if($master['matricula'] != null && $ass != false){ ?>
                    <h2> <?= $ass?>º </h2>
                    <form action ="controlador/upload.php" method  ="POST"  enctype="multipart/form-data">
                          <input name="ass" value="<?= $_REQUEST['ass']?>" type="hidden">
                          <input type="file" name = "arquivo"><br>
                          <input type="submit" name="enviar-lista">
                    </form>
    <?php } ?>
    <br>
               <?php foreach ($listaupload as $Upload) { ?>

                            <div class="lista">  <a href="<?= $Upload['assunto'] ?>"><?= $Upload['POWW']?></a>  </div> 
               <?php } ?>

 









</body>
</html>
