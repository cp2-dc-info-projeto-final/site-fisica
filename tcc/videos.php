
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
 
require_once('modelo/tabelausuario.php');
require_once('modelo/tabelaupload.php');



session_start();
  
	

  $ano = null;
  $listaupload = [];

  if (array_key_exists('username', $_SESSION) &&
      array_key_exists('idUsuárioConectado', $_SESSION))
  {
    $id = $_SESSION['idUsuárioConectado'];
    $master = BuscaUsuarioPorId($id);
    $user_name = $_SESSION['username'];
    

    if (array_key_exists('ano', $_REQUEST))
    {
      $ano = filter_var($_REQUEST['ano'], FILTER_VALIDATE_INT);
      $listaupload = ListadeUpload($ano);
    }
  }
  else
  {
    $usuario = null;
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
          <li><a class="a" id="a" href="exercicios.php">exercicios</a></li>
          <li><a class="a" href="videos.php">Videos</a></li>
      </ul>


	<div class="box">
		<a class="button" href="?Mecanica">Mecanica</a>
	</div>

			<div id="?Mecanica" class="overlay">
				<div class="popup">
					<h2>Mecanica</h2>
					<a class="close" href="videos.php">&times;</a>
					<div class="content">
					   <a >Equilibrio estável (Creditos: Física Universitária)
					   <iframe
				            width="1100"
				            height="500"
				            id="iframe"
				            src="https://www.google.com.br"
				            scrolling="no">
				    </iframe>

						<input type="button" value="abrir" onclick="exibirIframe();" />
						<input type="button" value="fechar" onclick="recolherIframe();" /> </a>
                       <a href="">Transformação de Energia Mecânica em Elétrica (Creditos: Física Universitária)</a>
                       <a href="https://www.youtube.com/watch?v=OjP8bPaadEM&list=PL1Dg4Oxxk_RK6PfpWLKisymx20Xw1aALd">Movimento retilíneo uniforme (Creditos: Física Universitária)</a>
                       <a href="https://www.youtube.com/watch?v=9aidNpFcwt8&list=PL1Dg4Oxxk_RK6PfpWLKisymx20Xw1aALd&index=5">Força gravitacional (Creditos: Física Universitária)</a>

					</div>
				</div>
			</div>

	<div class="box">
		<a class="button" href="?Termologia">Termologia</a>
	</div>

			<div id="?Termologia" class="overlay">
				<div class="popup">
					<h2>Termologia</h2>
					<a class="close" href="videos.php">&times;</a>
					<div class="content">
						<a href="https://www.youtube.com/watch?v=aKwZDvq2nm0">Propagação de Calor por Condução (Creditos: Francisco Lavarda)</a>
                        <a href="https://www.youtube.com/watch?v=c9utVkLBN9w">dilataçao termica no estato liquido (Creditos: Manual do Mundo)</a>
                        <a href="https://www.youtube.com/watch?v=fzLihPjZZmk&index=5&list=PL1Dg4Oxxk_RLkHSt6inHJP6BLrZiPDWn5">Escala de temperatura fahreinheit (Creditos: Física Universitária)</a>
                        <a href="https://www.youtube.com/watch?v=bH2eBu6lKUE">Calor específico (Creditos: fernanda alves)</a>
					</div>
				</div>
			</div>
	<div class="box">
		<a class="button" href="?Onda">Onda</a>
	</div>

			<div id="?Onda" class="overlay">
				<div class="popup">
					<h2>Onda</h2>
					<a class="close" href="videos.php">&times;</a>
					<div class="content">
						<a href="https://www.youtube.com/watch?v=zYdho_gcCRE&index=11&list=PL1Dg4Oxxk_RI2Ppb541vQyaUbqUuXtiuJ">Ondas transversais e longitudinais (Creditos: Física Universitária)</a>
                        <a href="https://www.youtube.com/watch?v=Ab9OB9Q6QNw&index=1&list=PL1Dg4Oxxk_RI2Ppb541vQyaUbqUuXtiuJ">Pendulos simples (Creditos: Física Universitária)</a>
                        <a href="https://www.youtube.com/watch?v=qIXBnrSgbpQ&index=13&list=PL1Dg4Oxxk_RI2Ppb541vQyaUbqUuXtiuJ">Ondas em cordas tensionadas (Creditos: Física Universitária)</a>
                        <a href="https://www.youtube.com/watch?v=h0kLMLRX9SY&index=19&list=PL1Dg4Oxxk_RI2Ppb541vQyaUbqUuXtiuJ">Ondas: o que sao e como se propagam (Creditos: Física Universitária)</a>
					</div>
				</div>
			</div>
	<div class="box">
		<a class="button" href="?Eletromagnetismo">Eletromagnetismo</a>
	</div>

			<div id="?Eletromagnetismo" class="overlay">
				<div class="popup">
					<h2>Eletromagnetismo</h2>
					<a class="close" href="videos.php">&times;</a>
					
				</div>
			</div>
	<div class="box">
		<a class="button" href="?Óptica">Óptica</a>
	</div>


</body>
<style>
	#iframe {
    display: none;
}
	
</style>
<script>
	
	function exibirIframe()
{
    document.getElementById("iframe").style.display = "block";
}
	function recolherIframe()
{
    document.getElementById("iframe").style.display = "";
}
</script>
</html>

