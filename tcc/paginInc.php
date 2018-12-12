
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="stylePaginInc.css">
  <title>higino0910</title>

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
   

    $id = $_SESSION['idUsuárioConectado'];
    $usuario = BuscaUsuarioPorId($id);
  }
  else
  {
    header('Location:loginAluno.php');
  }
?>
        <div class="logo"><img src="images/fisi.jpg" class="escola" ></div>
    
      <div class="prof">
    <div class="username"><?php   echo $user_name; ?></div> 
          <?php if($usuario['matricula'] != null){ ?>
             <a class = "linkpi" href="Cadastro.php"> <button id="CadButton" > Fazer o Cadastro </button> </a>
                   <?php } ?> 
      <br>
            <a href="controlador/sair.php"> <button id="Button" > Sair </button> </a>
      </div>        
    </div>
          
        <ul>
          <li><a href="formulas.php">Formulas</a></li>
          <li><a href="Exercicios.php">Exercicios</a></li>
          <li><a href="videos.php">Videos</a></li>
         
        </ul>
    
          <div class="Slides">

      <slider>
          <slide><p></p></slide>
          <slide><p></p></slide>
          <slide><p></p></slide>
          <slide><p></p></slide>
      </slider>
    </div>

    <div id="D2">
        
    </div>

    <div id="D3">
        <h1>ATENÇÃO</h1>
      Este é um site com o intuito de ajudar os alunos do Colégio Pedro II na matéria de física.<br>
      (OBS.: Ainda estamos em fase de desenvolvimento.)    
    </div>

  <div id="D4">
      <h1><a href="exercicios.php">Exercicios</a></h1><br>
      Poderá visualizar os exercicios de cada assunto abordado em sala e baixá-los.
     
  </div>

  <div id="D5">
      <h1><a href="videos.php">Vídeos</a></h1><br>
      Poderá assistir videos de experimentos.
  </div>

  <div id="D6">
      <h1><a href="formulas.php">Formulas</a></h1><br>
      Poderá visualizar algumas formulas de cada assunto abordado em sala.
  </div>

 

  <div id="D8">
      © Copyright
  </div>

</body>
</html>
