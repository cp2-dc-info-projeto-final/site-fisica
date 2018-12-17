
<!DOCTYPE html>

     

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercicios</title>
  <link rel="stylesheet" type="text/css" href="styleVid.css">   
</head>
<body>
  <div id="D1"> 
    <?php
 
require_once('modelo/tabelauploadvid.php');
require_once('modelo/tabelausuario.php');
require_once('modelo/tabelaassuntov.php');
require_once('modelo/tabelaurlvideos.php');


session_start();
 $listaurl = [];

  $listaupload = [];
  if (array_key_exists('errosurl', $_SESSION))
  {
    $erros = $_SESSION['errosurl'];
    unset($_SESSION['errosurl']);

  }
  else
  {
    $erros = null;
  }
  
  if (array_key_exists('errosassv', $_SESSION))
  {
    $erra = $_SESSION['errosassv'];
    unset($_SESSION['errosassv']);

  }
  else
  {
    $erra = null;
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
       
      <div class="prof">
     <div class="username"><?php   echo $user_name; ?></div>
          <?php if($master['matricula'] != null){ ?>
             <a class="a"  class = "linkpi" href="cadastroprof.php"> <button id="CadButton" > Fazer o Cadastro </button> </a>
                   <?php } ?> 
      <br>
            <a class="a" href="controlador/sair.php"> <button id="Button" > Sair </button> </a>
      </div>        
    </div>
    
      <ul>
          <li><a class="a"  href="paginInc.php">Home</a></li>
          <li><a class="a" href="formulas.php">Formulas</a></li>
          <li><a class="a"  href="exercicios.php">exercicios</a></li>
          <li><a class="a" id="a" href="videos.php">Videos</a></li>
      </ul>
              <?php if ($erra != null) { ?>
      <div class="alertalert-warning">
        <ul>
          <?php foreach ($erra as $erras) { ?>
            <li> <?= $erras ?> </li>
          <?php } ?>
        </ul>
      </div>
    <?php } ?>

            <?php if($master['matricula'] != null){ ?>
                      <form name="assuntonovo" method="post" action ="controlador/assuntosv.php" >
                            <input type="text" name="nome">
                            <input type="submit" value="Criar">
                      </form>
            <?php } ?>

                  <?php if(empty(ListaAssuntosv($id)) ){           
                       echo "Sem assuntos";?>

    <?php } else {
        $listaassuntos = ListaAssuntosv($id);
        foreach ($listaassuntos as $vid) { ?>
           <div class="box">
              <a href="?vid=<?php $vid['id']?>"><?= $vid['nome']?></a>

               <?php if ($erros != null) { ?>
      <div class="alertalert-warning">
        <ul>
          <?php foreach ($erros as $erro) { ?>
            <li> <?= $erro ?> </li>
          <?php } ?>
        </ul>
      </div>
    <?php } ?>

                          <?php if($master['matricula'] != null && $vid != false){ ?>
                            <form action = "controlador/urlvideo.php" method="post" name = "url">
                              <label><b class="textcol">Nome</b></label><br>
                                <input class="input" type="text" minlength="3" maxlength="255" placeholder="Digite o nome do video" name="nome" required=""><br>
                              <label><b class="textcol">URL do video</b></label><br>
                                <input class="input" type="text" minlength="6" maxlength="16" placeholder="Digite o url do video" name="url" required=""><br>
                              <input type="submit" name="Salvar URL"><br>


                              
                            </form><br><br>
                            <form action ="controlador/uploadvid.php" method  ="POST"  enctype="multipart/form-data">
                              <input name="vid" value="<?= $vid['id']?>" type="hidden">
                              <input type="file" name = "arquivo"><br>
                              <input type="submit" name="enviar-lista">
                            </form>
                          <?php } ?>
              <br>
                          <?php $listaupload = ListadeUpload($vid['id']); ?>
                          <?php foreach ($listaupload as $Upload) { ?>     

                            <div class="lista">  <a href="<?= $Upload['arquivo'] ?>"><?= $Upload['nome']?></a></div> 
                          <?php } ?>
                          <?php if(empty(listaurl($id)) )
                           { 
                            echo "Sem videos";
                             } 
                             else {
                              $listaurl = Listaurl($id); 
                              foreach ($listaurl as $lurl) { ?>
                               <iframe src="<?= $lurl['url']?>"><?= $lurl['nome']?></iframe> 
                             <?php if ($lurl['id']) { ?>
                             <?php }?>
                             <?php }?>
                             <?php }?>


          
            </div>
            <?php if ($vid['id']) { ?>
            <?php }?>
        <?php } ?>
    <?php } ?>

  



</body>
<style>
	#iframe {
    display: none;
}
	
</style>
</html>

