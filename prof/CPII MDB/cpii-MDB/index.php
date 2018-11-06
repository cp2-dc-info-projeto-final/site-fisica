<?php
	require_once('Modelo/TabelaFilmes.php');

	// PENDENTE: Recuperar filmes do BD

	$listaFiLmes=listaFiLmes();


		?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>CPII-MDB</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		img.img-thumbnail { height: 150px; }
		small.títuloOrig { font-style: italic; }
	</style>
</head>
<body>
	<?php require('Fragmentos/BarraNav.php'); ?>

	<div class="container">

		<div class="list-group list-group-flush">
			<!-- PENDENTE: Exibir todos os filmes vindos do BD -->
			<?php 

			foreach ($listaFiLmes as $filme)  {	?>
				<a href="filme.php?id=<?= $filme['id'] ?>" class="list-group-item list-group-item-action container">
					<div class="row">
						<div class="column">
							<img src="<?= $filme['cartaz'] ?>" class="img-thumbnail"/>
						</div>
						<div class="ml-3 column">
							<h5><?= $filme['títuloPor'] ?></h5>

							<?php if ($filme['títuloOrig'] != null) { ?>
								<small class="títuloOrig"><?= $filme['títuloOrig'] ?></small><br/>
							<?php } ?>

							<small>
								<?= $filme['país'] ?> | <?= $filme['ano'] ?>
							</small>
						</div>
					</div>
				</a>
<?php } ?>
		</div>

	</div>
</body>
</html>