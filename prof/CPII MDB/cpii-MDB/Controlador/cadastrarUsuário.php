<?php

require_once('../Utils.php');
require_once('../Modelo/TabelaUsuários.php');

$erros = [];

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
			   $request,
			   [ 'nome' => FILTER_DEFAULT,
			     'email' => FILTER_VALIDATE_EMAIL,
				 'senha' => FILTER_DEFAULT,
				 'confirmaSenha' => FILTER_DEFAULT,
				 'estado' => FILTER_DEFAULT ]
           );


$nome = $request['nome'];
if ($nome == false)
{
	$erros[] = "Nome inválido ou não informado";
}
else if (strlen($nome) < 3 || strlen($nome) > 127)
{
	$erros[] = "O nome deve ter no mínimo 3 e no máximo 127 caracteres.";
}


$email = $request['email'];
if ($email == false)
{
	$erros[] = "E-mail inválido ou não informado";
}
else if (BuscaUsuárioPorEmail($email) != false)
{
	$erros[] = "Já existe um usuário cadastrado com esse e-mail";
}


$senha = $request['senha'];
if ($senha == false)
{
	$erros[] = "Senha inválida ou não informada";
}
else if (strlen($senha) < 6 || strlen($senha) > 12)
{
	$erros[] = "A senha deve ter no mínimo 6 e no máximo 12 caracteres";
}
else if ($senha != $request['confirmaSenha'])
{
	$erros[] = "As senhas digitadas não conferem";
}

$request['senha'] = password_hash($senha, PASSWORD_DEFAULT);


$estado = $request['estado'];
if ($estado == false || in_array($estado, UFS) == false)
{
	$erros[] = "Estado inválido ou não informado";
}


session_start();

if (empty($erros))
{
	$id = InsereUsuário($request);
	$_SESSION['idUsuárioConectado'] = $id;

	Redireciona('../index.php');
}
else
{
	$_SESSION['errosCadastro'] = $erros;

	Redireciona('../cadastro.php');
}

?>