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
	$_SESSION['erroLogin'] = "Você precisa entrar com uma conta para avaliar um filme";
	Redireciona('../index.php');
}


$erros = [];

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [ 'idFilme' => FILTER_VALIDATE_INT,
                 'nota' => [ 'filter' => FILTER_VALIDATE_INT,
                             'options' => ['minrange' => 0, 'maxrange' => 10] ],
                 'comentários' => FILTER_DEFAULT ]
           );


$idFilme = $request['idFilme'];
if ($idFilme == false)
{
	$erros[] = "Filme inválido ou não informado";
}

if ($request['nota'] == false)
{
	$erros[] = "Nota inválida ou não informada (deve ser um valor entre 0 e 5)";
}

if (empty($erros))
{
	InsereAvaliação($idUsuárioConectado,
	                $request['idFilme'],
	                $request['nota'],
	                 $request['comentários']);
	
	$âncora = "comentário_$idUsuárioConectado";
}
else
{
	$_SESSION['errosAvaliação'] = $erros;
	$âncora = "formAvaliação";
}

Redireciona("../filme.php?id=$idFilme#$âncora");

?>