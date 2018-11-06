<?php
	require_once('Modelo/TabelaUsuários.php');
	require_once('Utils.php');


	// Como este arquivo será incluído a partir de outros arquivos de visão,
	// precisamos verificar se o arquivo em que este está sendo inserido já não
	// abriu a sessão antes. Caso contrário, dispararíamos um alerta de "sessão já
	// aberta" se chamássemos novamente o `session_start()`:
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}


	if (array_key_exists('idUsuárioConectado', $_SESSION))
	{
		$usuárioConectado = BuscaUsuárioPorId($_SESSION['idUsuárioConectado']);
	}
	else
	{
		$usuárioConectado = null;
	}

	$navErroLogin = ExtraiRegistroSessão('erroLogin');
?>
<nav class="navbar navbar-dark bg-dark">
	<a class="navbar-brand" href="index.php">CPII-MDB</a>

	<?php if ($usuárioConectado == null) { ?>
		<a class="ml-auto mr-3" href="cadastro.php">Cadastre-se</a>
		<form class="form-inline" method="POST" action="Controlador/entrar.php">
			<input name="email" type="email" placeholder="E-mail">
			<input name="senha" type="password" placeholder="Senha">
			<input name="local" type="hidden" value="<?= $_SERVER['REQUEST_URI'] ?>">
			<input type="submit" value="Entrar">
		</form>
	<?php } else { ?>
		<a class="ml-auto mr-2" href="usuário.php"><?= $usuárioConectado['nome'] ?></a>

		<form class="form-inline" method="POST" action="Controlador/sair.php">
			<input name="local" type="hidden" value="<?=  $_SERVER['REQUEST_URI'] ?>">
			<input type="submit" value="Sair">
		</form>
	<?php } ?>
</nav>

<?php if ($navErroLogin != null) { ?>
	<div class="alert alert-warning">
		<p>Erro: <?= $navErroLogin ?></p>
	</div>
<?php } ?>