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

session_start();

  if (array_key_exists('username', $_SESSION) &&
      array_key_exists('idUsuárioConectado', $_SESSION))
  {

    $user_name = $_SESSION['username'];
    echo $user_name;

    $id = $_SESSION['idUsuárioConectado'];
    $usuario = BuscaUsuarioPorId($id);
  }
  else
  {
    header('Location:loginAluno.php');
  }
?>
<div class="logo"><img src="images/hig.jpg" class="escola" ></div>
    
      <div class="prof">
      <br>
     <br>
          <?php if($usuario['matricula'] != null){ ?>
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
		<div class="box">
    <a href="?ass=1">mecanica</a>
    </div>
    <?php if ($ass == 1) { ?>
          
    <?php } ?>

    <div class="box">
    <a class="button" href="?ass=2">termologia</a>
  </div>
    <?php if ($ass == 2) { ?>
      <div id="popup2" class="overlay">
        <div class="popup">
          </div>
        </div>
      </div>
    <?php } ?>

  <div class="box">
    <a class="button" href="?ass=3">onda</a>
  </div>
    <?php if ($ass == 3) { ?>
      <div id="popup3" class="overlay">
        <div class="popup">
          </div>
        </div>
      </div>
    <?php } ?>

    <div class="box">
    <a class="button" href="?ass=4">eletromagnetismo</a>
  </div>
    <?php if ($ass == 4) { ?>
      <div id="popup4" class="overlay">
        <div class="popup">
          </div>
        </div>
      </div>
    <?php } ?>

    <div class="box">
    <a class="button" href="?ass=5">optica</a>
  </div>
    <?php if ($ass == 5) { ?>
      <div id="popup5" class="overlay">
        <div class="popup">
          </div>
        </div>
      </div>
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

                            <div class="lista">  <a href="<?= $Upload['arquivo'] ?>"><?= $Upload['nome']?></a>  </div> 
               <?php } ?>

 
</body>
</html>
