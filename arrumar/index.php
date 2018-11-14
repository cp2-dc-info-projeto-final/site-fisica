<?php
	require_once('Utils.php');
	require_once('Modelo/TabelaAlunos.php');
	require_once('Modelo/TabelaTarefas.php');

	session_start();

	if (array_key_exists('idAlunoConectado', $_SESSION))
	{
		$idAlunoConectado = $_SESSION['idAlunoConectado'];
		$alunoConectado = BuscaAlunoPorId($idAlunoConectado);
		$tarefas = BuscaTarefasAluno($alunoConectado);
	}
	else
	{
		$alunoConectado = null;
	}

	$erroCarregamento = ExtraiRegistroSessão('erroCarregamento');
?>
<html lang="pt-br">
<head>
	<title>Entrega de tarefas</title> 
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

	<?php require('Fragmentos/BarraNav.php') ?>

	<h1>Entrega de tarefas</h1>

	<?php if ($erroCarregamento != null) { ?>
		<div class="alert alert-warning">
			<p>Erro: <?= $erroCarregamento ?></p>
		</div>
	<?php } ?>

	<?php if ($alunoConectado != null) { ?>

		<h2>Turma <?= $alunoConectado['turma'] ?></h2>

		<div class="list-group list-group-flush">

			<?php foreach ($tarefas as $tarefa) { ?>
				<div class="list-group-item">
					<h3> <?= $tarefa['título'] ?> </h3>
					<p> <?= $tarefa['descrição'] ?> </p>

					<!-- PENDENTE: Adicionar formulário de carregamento do arquivo -->
                    <form method="POST" action="Controlador/entregarTarefa.php" enctype="multipart/form-data">
                        <input type="hidden" name="idTarefa" value="<?= $tarefa["id"] ?>">
                    	<input type="file" name="arquivo">
                    	<small>Tam.máx.: <?= ini_get('upload_max_filesize') ?> </small>
                        <input name="enviar" type="submit">
					</form>	

					<?php if ($tarefa['arquivo'] != null) { ?>
						<a href="<?= $tarefa['arquivo'] ?>">Baixar</a> 


						
							<a href="">Remover</a>				

					<?php } ?>


				</div>
			<?php } ?>

		</div>
		
	<?php } else {  // Aluno não conectado ?>
		<p>Entre com a sua conta para visualizar as tarefas.</p>
	<?php } ?>

</body>