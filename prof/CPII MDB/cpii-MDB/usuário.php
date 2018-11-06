<?php
	require_once('Fragmentos/BotãoRemoverAvaliação.php');
	require_once('Modelo/TabelaUsuários.php');
	require_once('Modelo/TabelaAvaliações.php');
	require_once('Utils.php');

	$idUsuário = 1;  // PENDENTE: Escolher corretamente o usuário a exibir

	$usuário = BuscaUsuárioPorId($idUsuário);
	$listaAvaliações = ListaAvaliaçõesUsuário($idUsuário);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>CPII-MDB</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		img.cartaz { height: 150px; }
	</style>
</head>
<body>
	<?php require('Fragmentos/BarraNav.php'); ?>

	<div class="container">
		<h1><?= $usuário['nome'] ?></h1>
		<p><?= $usuário['estado'] ?></p>

		<h2>Filmes avaliados: <?= count($listaAvaliações) ?> </h2>
		<ul class="list-group list-group-flush">
			<?php foreach ($listaAvaliações as $avaliação) { ?>
				<li class="list-group-item container">
					<div class="row">
						<div class="column">
						<a href="filme.php">
							<img class="img-thumbnail cartaz" src="<?= $avaliação['cartazFilme'] ?>"/>
						</a>
						</div>
						<div class="column ml-2">
							<p>
								<a href="filme.php?id=<?= $avaliação['idFilme'] ?>"><?= $avaliação['títuloFilme'] ?></a>
								│ Nota: <?= $avaliação['nota'] ?>
							</p>

							<?php if ($avaliação['comentários']) { ?>
								<p>"<?= $avaliação['comentários'] ?>"</p>
							<?php } ?>

							<?php BotãoRemoverAvaliação($avaliação['idFilme']); ?>
						</div>
					</div>
				</li>
			<?php } ?>
		</ul>

		<?php if(empty($listaAvaliações)) { ?>
			<p>Nenhum filme avaliado.</p>
		<?php } ?>
	</div>
</body>
</html>