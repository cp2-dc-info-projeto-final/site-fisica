<<<<<<< HEAD
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
          <li><a class="a" href="formulas.php">Formulas</a></li>
          <li><a class="a" href="exercicios.php">exercicios</a></li>
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
					   <a href="https://www.youtube.com/watch?v=1Yh3V87IAjc&list=PL1Dg4Oxxk_RK6PfpWLKisymx20Xw1aALd&index=18">Equilibrio estável (Creditos: Física Universitária)</a>
                       <a href="https://www.youtube.com/watch?v=iCEMmQBgkY0">Transformação de Energia Mecânica em Elétrica (Creditos: Física Universitária)</a>
                       <a href="https://www.youtube.com/watch?v=OjP8bPaadEM&list=PL1Dg4Oxxk_RK6PfpWLKisymx20Xw1aALd">Movimento retilíneo uniforme (Creditos: Física Universitária)</a>
                       <a href="https://www.youtube.com/watch?v=9aidNpFcwt8&list=PL1Dg4Oxxk_RK6PfpWLKisymx20Xw1aALd&index=5">Força gravitacional (Creditos: Física Universitária)</a>

					</div>
				</div>
			</div>
			<iframe width="1019" height="573" src="https://www.youtube.com/embed/mqjWQYX6hxs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
					<div class="content">
						<a href="https://www.youtube.com/watch?v=Li9ECwSyDFU&list=PL1Dg4Oxxk_RKMZdv6OPGdj6FQ-S5c8F3W">Eletrização por indução e aterramento (Creditos: Física Universitária)</a>
                        <a href="https://www.youtube.com/watch?v=XhhZ2zRN4Lo&index=15&list=PL1Dg4Oxxk_RKMZdv6OPGdj6FQ-S5c8F3W">Campo eletrica e Força eletrica</a>
                        <a href="https://www.youtube.com/watch?v=INC0G_hwXoc&index=13&list=PL1Dg4Oxxk_RKMZdv6OPGdj6FQ-S5c8F3W">Gerador eletrostatico</a>
                        <a href="https://www.youtube.com/watch?v=voIcxwNj7qs&index=26&list=PL1Dg4Oxxk_RKMZdv6OPGdj6FQ-S5c8F3W">Corrente eletrica e lei de Ohm</a>
					</div>
				</div>
			</div>
	<div class="box">
		<a class="button" href="?Óptica">Óptica</a>
	</div>

			<div id="?Óptica" class="overlay">
				<div class="popup">
					<h2>Óptica</h2>
					<a class="close" href="videos.php">&times;</a>
					<div class="content">
					<a href="https://www.youtube.com/watch?v=uKN3X16f-ng&list=PL1Dg4Oxxk_RIw4M-bT9bgTIv4MMBth-ln&index=5">Lentes e espelhos (Creditos: Física Universitária)</a>
                    <a href="https://www.youtube.com/watch?v=sDcWsx00O48&index=7&list=PL1Dg4Oxxk_RIw4M-bT9bgTIv4MMBth-ln">Espalhamento da luz (Creditos: Física Universitária)</a>
                    <a href="https://www.youtube.com/watch?v=zUZqSkWWgkw&index=6&list=PL1Dg4Oxxk_RIw4M-bT9bgTIv4MMBth-ln">Decomposiçao da luz: Prisma (Creditos: Física Universitária)</a>
                    <a href="https://www.youtube.com/watch?v=EJ3mWMpNY5M&index=4&list=PL1Dg4Oxxk_RIw4M-bT9bgTIv4MMBth-ln">Decomposiçao da visao (Creditos: Física Universitária)</a>
					</div>
				</div>
			</div>


</body>
</html>
=======
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
             <a class = "linkpi" href="Cadastro.php"> <button id="CadButton" > Fazer o Cadastro </button> </a>
                   <?php } ?>
      <br>
            <a href="controlador/sair.php"> <button id="Button" > Sair </button> </a>
      </div>
    </div>
      <ul>
        <li><a href="paginInc.php">Home</a></li>
        <li><a href="exercicios.php">Exercicios</a></li>
        <li><a href="formulas.php">Formulas</a></li>
      </ul>
	<div class="box">
		<a class="button" href="?Mecanica">Mecanica</a>
	</div>

			<div id="?Mecanica" class="overlay">
				<div class="popup">
					<h2>Mecanica</h2>
					<a class="close" href="videos.php">&times;</a>
					<div class="content">
					   <a href="https://www.youtube.com/watch?v=1Yh3V87IAjc&list=PL1Dg4Oxxk_RK6PfpWLKisymx20Xw1aALd&index=18">Equilibrio estável (Creditos: Física Universitária)</a>
                       <a href="https://www.youtube.com/watch?v=iCEMmQBgkY0">Transformação de Energia Mecânica em Elétrica (Creditos: Física Universitária)</a>
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
					<div class="content">
						<a href="https://www.youtube.com/watch?v=Li9ECwSyDFU&list=PL1Dg4Oxxk_RKMZdv6OPGdj6FQ-S5c8F3W">Eletrização por indução e aterramento (Creditos: Física Universitária)</a>
                        <a href="https://www.youtube.com/watch?v=XhhZ2zRN4Lo&index=15&list=PL1Dg4Oxxk_RKMZdv6OPGdj6FQ-S5c8F3W">Campo eletrica e Força eletrica</a>
                        <a href="https://www.youtube.com/watch?v=INC0G_hwXoc&index=13&list=PL1Dg4Oxxk_RKMZdv6OPGdj6FQ-S5c8F3W">Gerador eletrostatico</a>
                        <a href="https://www.youtube.com/watch?v=voIcxwNj7qs&index=26&list=PL1Dg4Oxxk_RKMZdv6OPGdj6FQ-S5c8F3W">Corrente eletrica e lei de Ohm</a>
					</div>
				</div>
			</div>
	<div class="box">
		<a class="button" href="?Óptica">Óptica</a>
	</div>

			<div id="?Óptica" class="overlay">
				<div class="popup">
					<h2>Óptica</h2>
					<a class="close" href="videos.php">&times;</a>
					<div class="content">
					<a href="https://www.youtube.com/watch?v=uKN3X16f-ng&list=PL1Dg4Oxxk_RIw4M-bT9bgTIv4MMBth-ln&index=5">Lentes e espelhos (Creditos: Física Universitária)</a>
                    <a href="https://www.youtube.com/watch?v=sDcWsx00O48&index=7&list=PL1Dg4Oxxk_RIw4M-bT9bgTIv4MMBth-ln">Espalhamento da luz (Creditos: Física Universitária)</a>
                    <a href="https://www.youtube.com/watch?v=zUZqSkWWgkw&index=6&list=PL1Dg4Oxxk_RIw4M-bT9bgTIv4MMBth-ln">Decomposiçao da luz: Prisma (Creditos: Física Universitária)</a>
                    <a href="https://www.youtube.com/watch?v=EJ3mWMpNY5M&index=4&list=PL1Dg4Oxxk_RIw4M-bT9bgTIv4MMBth-ln">Decomposiçao da visao (Creditos: Física Universitária)</a>
					</div>
				</div>
			</div>


</body>
</html>
>>>>>>> 608939fadc59e71838c68e4de25c7dc7b0b5e228
