<?php


require_once('../modelo/tabelausuario.php');

$erro = "";

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [ 'emailmatricula' => FILTER_DEFAULT,
                 'senha' => FILTER_DEFAULT
                 ]
           );


$emailmatricula = $request['emailmatricula'];
$senha = $request['senha'];


if ($emailmatricula == false)
{
	$erro = "E-mail inválido ou não informado";
}
else if ($senha == false)
{
	$erro = "Senha inválida ou não informada";
}
else
{
	$usuario = buscaporidentificador($emailmatricula);
	if ($usuario == false)
	{
		$erro = "Usuário não cadastrado";
	}
	else if (password_verify($senha, $usuario['senha']) == false)
	
	{
		$erro = "Senha inválida";
	}
}


session_start();

if ($erro == null)
{
	$_SESSION['idUsuárioConectado'] = $usuario['id']; 
	$user_name = $usuario['nome'];
	$_SESSION['username'] = $user_name;
	header('Location: ../paginInc.php');
	
}
else
{
	$_SESSION['erroLogin'] = $erro;
	header('Location: ../login.php');
}

?>