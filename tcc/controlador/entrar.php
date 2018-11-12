<?php

require_once('../Utils.php');
require_once('../Modelo/TabelaUsuários.php');

$erro = "";

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [ 'email' => FILTER_VALIDATE_EMAIL,
                 'senha' => FILTER_DEFAULT,
                 'local' => FILTER_DEFAULT ]
           );


$email = $request['email'];
$senha = $request['senha'];

if ($email == false)
{
	$erro = "E-mail inválido ou não informado";
}
else if ($senha == false)
{
	$erro = "Senha inválida ou não informada";
}
else
{
	$usuário = BuscaUsuárioPorEmail($email);
	if ($usuário == false)
	{
		$erro = "Usuário não cadastrado";
	}
	else if (password_verify($senha, $usuário['senha']) == false)
	{
		$erro = "Senha inválida";
	}
}


session_start();
if ($erro == null)
{
	$_SESSION['idUsuárioConectado'] = $usuário['id'];
}
else
{
	$_SESSION['erroLogin'] = $erro;
}

$local = $request['local'];
Redireciona($local);

?>