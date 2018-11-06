<?php
	require_once('Modelo/TabelaAlunos.php');
	require_once('Modelo/TabelaTurmas.php');
	require_once('Utils.php');

	session_start();

	$listaTurmas = ListaTurmas();
	$listaErros = ExtraiRegistroSessão('errosCadastro');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>CPII-MDB</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<?php require('Fragmentos/BarraNav.php'); ?>

	<div class="container">

		<?php if ($listaErros != null) { ?>
			<div class="alert alert-warning">
				<ul>
					<?php foreach ($listaErros as $erro) { ?>
						<li> <?= $erro ?> </li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>

		<form action="Controlador/cadastrarAluno.php">
			<div class="form-group">
				<label>Nome
					<input name="nome" type="text" class="form-control" placeholder="Ana Clara" required minlength="3" maxlength="127">
				</label>
			</div>
			<div class="form-group">
				<label>E-Mail
					<input name="email" type="email" class="form-control" placeholder="ana@example.net" required>
				</label>
			</div>
			<div class="form-group">
				<label>Senha
					<input name="senha" type="password" class="form-control" placeholder="******" required minlength="6" maxlength="12">
				</label>
			</div>
			<div class="form-group">
				<label>Confirma senha
					<input name="confirmaSenha" type="password" class="form-control" placeholder="******" required minlength="6" maxlength="12">
				</label>
			</div>

			<div class="form-group">
				<label>Turma
					<select name="turma" class="form-control" required>
						<option value="" disabled selected>Selecione</option>

						<?php foreach ($listaTurmas as $turma) { ?>
							<option value="<?= $turma['id'] ?>"><?= $turma['turma'] ?></option>
						<?php } ?>
					</select>
				</label>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>