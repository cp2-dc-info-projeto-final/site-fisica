<?php


require_once('../modelo/tabelausuario.php');

$erro = "";

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [ 'email' => FILTER_VALIDATE_EMAIL,
                 'senha' => FILTER_DEFAULT,
                 ]
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

{
	$usuario = BuscaUsuarioPorEmail($email);
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
	$user_name = $usuario['email'];
	$_SESSION['username'] = $user_name;
	header('Location: ../paginInc.php');


}
else
{
	$_SESSION['erroLogin'] = $erro;
	header('Location: ../loginAluno.php');
}

echo $erro;
echo $erroLogin;
?>