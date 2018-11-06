<?php

require_once('../Utils.php');
require_once('../Modelo/TabelaAvaliações.php');


session_start();

if (array_key_exists('idUsuárioConectado', $_SESSION))
{
	$idUsuárioConectado = $_SESSION['idUsuárioConectado'];
}
else
{
	$_SESSION['erroLogin'] = "Você precisa entrar com uma conta para excluir a avaliação de um filme";
	Redireciona('../index.php');
}


$erro = null;

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [ 'local' => FILTER_DEFAULT,
                 'idFilme' => FILTER_VALIDATE_INT ]
           );


$idFilme = $request['idFilme'];
if ($idFilme == false)
{
	$erro = "Filme inválido ou não informado";
}

if ($erro == null)
{
	RemoveAvaliação($idUsuárioConectado, $idFilme);
}
else
{
	$_SESSION['erroRemoverAvaliação'] = $erro;
}

Redireciona($request['local']);

?>