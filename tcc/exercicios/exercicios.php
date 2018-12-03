<?php
 
require_once('modelo/tabelausuario.php');
require_once('modelo/tabelaupload.php');
require_once('controlador/upload.php');



  if (array_key_exists('username', $_SESSION) &&
      array_key_exists('idUsuárioConectado', $_SESSION))
  {
    $upload = BuscauploadPorId($id);
    $user_name = $_SESSION['username'];
    $id = $_SESSION['idUsuárioConectado'];
    $master = BuscaUsuarioPorId($id);
    echo $user_name;
  }
  else
  {
    $usuario = null;
    header('Location:login.php');
  }
  
?>
     
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercicios</title>
  <link rel="stylesheet" type="text/css" href="styleFor_1.css">		
</head>
<body>
	<div id="D1">	
       
      <div class="prof">
      <br>
     <br>
          <?php if($master['matricula'] != null){ ?>
             <a class = "linkpi" href="Cadastro.php"> <button id="CadButton" > Fazer o Cadastro </button> </a>
                   <?php } ?> 
      <br>
            <a href="controlador/sair.php"> <button id="Button" > Sair </button> </a>
      </div>				
    </div>
      <ul>
          <li><a href="paginInc.php">Home</a></li>
          <li><a href="formulas.php">Formulas</a></li>
          <li><a href="Exercicios.php">Exercicios</a></li>
          <li><a href="videos.php">Videos</a></li>
      </ul>
	<div class="box">
		<a class="button" href="#popup1">1ºano</a>
	</div>

			<div id="popup1" class="overlay">
				<div class="popup">
					<h2>1ºano</h2>
					<a class="close" href="#">&times;</a>
					<form action ="controlador/upload.php" method  ="POST"  enctype="multipart/form-data">
            <input name="idUpload" value="<?= $upload['id']?>" type="hidden">
            <input type="file" name = "arquivo"><br>
            <input type="submit" name="enviar-lista">
           </form>
          <div class="content">
					    <a href="exercicios/temperatura.docx">1ºano - Fis 1 - Lista 1 - Temperatura</a>
						<a href="exercicios/dilatacao.docx">1ºano - Fis 1 - Lista 02 - Dilatação</a>
						<a href="exercicios/cs.doc">1ºano - Fis 1 - Lista 03 - Calor sensível e trocas de calor</a>
                        <a href="exercicios/calorimetria.doc">1ºano - Fis 1 - Lista 03 - Calorimetria</a>
                        <a href="exercicios/calorLatente.doc">1ºano - Fis 1 - Lista 04 - Calor latente</a>
                        <a href="exercicios/TCMF.doc">1ºano - Fis 1 - Lista 05 - Trocas de calor com mudança de fase</a>
                        <a href="exercicios/DFPC.doc">1ºano - Fis 1 - Lista 06 - Diagrama de fase e propagação do calor</a>
                        <a href="exercicios/gases.doc">1ºano - Fis 1 - Lista 07 - Gases</a>
                        <a href="exercicios/IDS.docx">Integrado 1ª série - Fís - Lista 02 - Dilatação dos sólidos</a>
                        <a href="exercicios/ICSTC.docx">Integrado 1ª série - Fís - Lista 03 - Calor sensível e trocas de calor</a>
                        <a href="exercicios/IcalorLatente.doc">Integrado 1ª série - Fís - Lista 04 - Calor latente</a>
                        <a href="htdocs/<?= $upload['arquivo'] ?>"> baixar</a>
                
					</div>
          
				</div>
			</div>
	<div class="box">
		<a class="button" href="#popup2">2ºano</a>
	</div>

			<div id="popup2" class="overlay">
				<div class="popup">
					<h2>2ºano</h2>
					<a class="close" href="#">&times;</a>
					<div class="content">
						<a href="exercicios/QUESTAO_REVISAO_II_PFV_2_INT.pdf">QUESTAO_REVISAO_II_PFV_2_INT</a>
                        <a href="">Gabarito Lista 9 2 integrado</a>
                        <a href="exercicios/GABARITO%20COMENTADO%20LISTA%2008.pdf">GABARITO COMENTADO LISTA 08</a>
                        <a href="exercicios/2%C2%AA%20s%C3%A9rie%20Int%20-lista%2001%20-%20Lentes%20Esf%C3%A9ricas%20e%20Optica%20da%20Vis%C3%A3o.pdf">2ª série Int -lista 01 - Lentes Esféricas e Optica da Visão</a>
                        <a href="exercicios/2%C2%AA%20s%C3%A9rie%20Int%20-%20Fis%20%20-%20Lista%2009%20-%20Revis%C3%A3o.pdf">2ª série Int - Fis  - Lista 09 - Revisão</a>
                        <a href="exercicios/2%C2%AA%20s%C3%A9rie%20Int%20-%20Fis%20%20-%20Lista%2008%20-%20Cinem%C3%A1tica%20Angular%20e%20Momento(torque).pdf">2ª série Int - Fis  - Lista 08 - Cinemática Angular e Momento(torque)</a>
                        <a href="exercicios/2%C2%AA%20s%C3%A9rie%20Int%20-%20Fis%20%20-%20Lista%2007%20-%20Impulso%20e%20Quantidade%20de%20movimento.pdf">2ª série Int - Fis  - Lista 07 - Impulso e Quantidade de movimento</a>
                        <a href="exercicios/2%C2%AA%20s%C3%A9rie%20Int%20-%20Fis%20%20-%20Lista%2006%20-%20Trabalho%20e%20Energia.pdf">2ª série Int - Fis  - Lista 06 - Trabalho e Energia</a>
                        <a href="exercicios/2%C2%AA%20s%C3%A9rie%20Int%20-%20Fis%20%20-%20Lista%2005%20-%20Din%C3%A2mica%20e%20Leis%20de%20Newton.pdf">2ª série Int - Fis  - Lista 05 - Dinâmica e Leis de Newton</a>
                        <a href="exercicios/2%C2%AA%20s%C3%A9rie%20Int%20-%20Fis%20%20-%20Lista%2004%20-%20Vetores.docx">2ª série Int - Fis  - Lista 04 - Vetores</a>
                        <a href="exercicios/2%C2%AA%20s%C3%A9rie%20Int%20-%20Fis%20%20-%20Lista%2004%20-%20Vetores%20-pdf.pdf">2ª série Int - Fis  - Lista 04 - Vetores -pdf</a>
					</div>
				</div>
			</div>
	<div class="box">
		<a class="button" href="#popup3">3ºano</a>
	</div>

			<div id="popup3" class="overlay">
				<div class="popup">
					<h2>3ºano</h2>
					<a class="close" href="#">&times;</a>
					<div class="content">
						<a href="exercicios/3° ANO Lista_de_Aprofundamento_Enem_Uerj_Eletromagnetismo.pdf">3° ANO Lista_de_Aprofundamento_Enem_Uerj_Eletromagnetismo</a>
						<a href="exercicios/3ª série - Fis 1 - Lista 01 - Eletrização.docx">3ª série - Fis 1 - Lista 01 - Eletrização</a>
                        <a href="exercicios/3ª série - Fis 1 - Lista 01 - Eletrização.pdf">3ª série - Fis 1 - Lista 01 - Eletrização</a>
                        <a href="exercicios/3ª série - Fis 1 - Lista 03 - Corrente elétrica.docx">3ª série - Fis 1 - Lista 03 - Corrente elétrica</a>
                        <a href="exercicios/3ªsérie -LISTA ONDULATÓRIA.pdf">3ªsérie -LISTA ONDULATÓRIA</a>
                        <a href="exercicios/3º ANO - Fis 1 - Lista 6 - Campo Elétrico (2).doc">3º ANO - Fis 1 - Lista 6 - Campo Elétrico</a>
                        <a href="exercicios/3º ANO - Fis 1 - Lista 6 - Força Elétrica 2017.doc">3º ANO - Fis 1 - Lista 6 - Força Elétrica 2017</a>
                        <a href="exercicios/3º ANO - Fis 2 - Lista  - Acústica.pdf">3º ANO - Fis 2 - Lista  - Acústica</a>
                        <a href="exercicios/3º ANO - Fis 2 - Lista 2 - Hidrostática 1 - 2017.pdf">3º ANO - Fis 2 - Lista 2 - Hidrostática 1 - 2017</a>
                        <a href="exercicios/3º ANO - Fis 2 - Lista 2 - Hidrostática 1 - 2018.pdf">3º ANO - Fis 2 - Lista 2 - Hidrostática 1 - 2018</a>
                        <a href="exercicios/3º ANO - Fis 2 - Lista 3 - Hidrostática 2  - 2018 - EMPUXO.pdf">3º ANO - Fis 2 - Lista 3 - Hidrostática 2  - 2018 - EMPUXO</a>
                        <a href="exercicios/3º ANO - Fis 2 - Lista 4 - Acústica e Instrumenstos sonoros - 2018.pdf">3º ANO - Fis 2 - Lista 4 - Acústica e Instrumenstos sonoros - 2018</a>
                        <a href="exercicios/3º ANO - Fis 2 - Lista 5 -Ímãs e Fontes de Campo- 2018.pdf">3º ANO - Fis 2 - Lista 5 -Ímãs e Fontes de Campo- 2018</a>
                        <a href="exercicios/3º ANO - Fis 2 - Lista 6 -Força Magnética de Lorentz- 2018.pdf">3º ANO - Fis 2 - Lista 6 -Força Magnética de Lorentz- 2018</a>
                        <a href="exercicios/3º ANO - Fis 2 - Lista 7 -Indução eletromagnética- 2018.pdf">3º ANO - Fis 2 - Lista 7 -Indução eletromagnética- 2018</a>
                        <a href="exercicios/3º ANO - Fis 2 - Lista de revisão para o ENEM.pdf">3º ANO - Fis 2 - Lista de revisão para o ENEM</a>
                        <a href="exercicios/QUESTAO_Todas_as_questoes_de_ondas_do_ENEM.pdf">QUESTAO_Todas_as_questoes_de_ondas_do_ENEM</a>
                        
					</div>
				</div>
			</div>
</body>
</html>
