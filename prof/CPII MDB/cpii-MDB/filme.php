<?php
	require_once('Fragmentos/BotãoRemoverAvaliação.php');
	require_once('Modelo/TabelaFilmes.php');
	require_once('Modelo/TabelaAvaliações.php');
	require_once('Utils.php');


	session_start();




	$idFilme = $_REQUEST['id'];  // PENDENTE:  Escolher corretamente o filme a exibir

	$filme = BuscaFilmePorId($idFilme);
	$listaAvaliações = ListaAvaliaçõesFilme($idFilme);

	$listaErrosAvaliação = ExtraiRegistroSessão('errosAvaliação');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>CPII-MDB</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		img.cartaz { height: 450px; }
		small.nomeOrig { font-style: italic; }
	</style>
</head>
<body>
	<?php require('Fragmentos/BarraNav.php'); ?>

	<div class="container">

		<div class="row">
			<div class="column">
				<img class="cartaz" src="<?= $filme['cartaz'] ?>">
			</div>
			<div class="column ml-5">
				<h1><?= $filme['títuloPor'] ?></h1>
				<p>
					<?php if ($filme['títuloOrig'] != null) { ?>
						<small class="títuloOrig"><?= $filme['títuloOrig'] ?></small><br/>
					<?php } ?>
					<?= $filme['gênero'] ?> | <?= $filme['país'] ?> | <?= $filme['ano'] ?>
				</p>
				<p><strong>Nota: <?= CalculaNotaFilme($listaAvaliações) ?></strong></p>
			</div>
		</div>

		<h2>Avaliações: <?= count($listaAvaliações) ?></h2>
		<ul class="list-group list-group-flush">
			<?php foreach ($listaAvaliações as $avaliação) { ?>
				<li class="list-group-item" id="comentário_<?= $avaliação['idUsuário'] ?>">
					<p>
						<a href="usuário.php"><?= $avaliação['nomeUsuário'] ?></a>
						│ Nota: <?= $avaliação['nota'] ?>
					</p>

					<?php if ($avaliação['comentários']) { ?>
						<p>"<?= $avaliação['comentários'] ?>"</p>
					<?php } ?>

					<?php if ($avaliação['idUsuário'] == $usuárioConectado['id']) { ?>
						<?php BotãoRemoverAvaliação($idFilme); ?>
					<?php } ?>
				</li>
			<?php } ?>
		</ul>

		<?php if ($listaErrosAvaliação != null) { ?>
			<div class="alert alert-warning">
				<ul>
					<?php foreach ($listaErrosAvaliação as $erro) { ?>
						<li> <?= $erro ?> </li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>

		<?php if ($usuárioConectado != null) { ?>

			<form id="formAvaliação" method="POST" action="Controlador/avaliar.php">
				<input type="hidden" name="idFilme" value ="<?= $idFilme ?>" >
				<div class="form-group">
					<label>Nota
						<input class="form-control" name="nota" type="number" required min="0" max="5">
					</label>
				</div>
				<div class="form-group">
					<label for="comentários">Comentários</label>
					<textarea id="comentários" class="form-control" name="comentários" maxlength="500"></textarea>
					<small>Máximo: 500 caracteres</small>
				</div>
				<input type="submit" value="Avaliar">
			</form>

		<?php } else { ?>
			<p><a href="cadastro.php">Cadastre-se</a> ou entre com a sua conta para avaliar este filme.</p>
		<?php } ?>
	</div>
</body>
</html>