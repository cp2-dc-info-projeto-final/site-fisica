<?php
	require_once('../Tabelas/dadosClientes.php');

	$erro = null;

	$request = array_map('trim', $_REQUEST);
	$request = filter_var_array(
	               $request,
	               [ 'email' => FILTER_VALIDATE_EMAIL,
	                 'senha' => FILTER_DEFAULT ]
	           );

	$email = $request['email'];
	$senha = $request['senha'];

	if ($email == false)
	{
		$erro = "E-Mail não informado";
	}
	else if (array_key_exists($email, $dadosClientes) == false)
	{
		$erro = "Nenhum cliente encontrado para este E-Mail";
	}
	else if ($senha == false)
	{
		$erro = "Senha não informada";
	}
	else if (password_verify($senha, $dadosClientes[$email]['senha'])){

		session_start();
		$_SESSION['emailUsuarioLogado'] = $request['email'];

		header('Location: ../pedidos.php');
		exit();

	}

	else
	{
		$erro = "Senha inválida";
	}

	session_start();

	$_SESSION['erro'] = $erro;
	header('Location: ../index.php');

?>
