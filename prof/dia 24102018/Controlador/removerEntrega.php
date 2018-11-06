<?php

	require_once('../Utils.php');
	require_once('../Modelo/TabelaTarefas.php');


	// PENDENTE: Receber o arquivo carregado pelo usuário
	session_start();

	if(array_key_exists('idAlunoConectado', $_SESSION))
	{
		$idAlunoConectado = $_SESSION['idAlunoConectado'];
	}
	else
	{
		$_SESSION['erroLogin'] = 'Identifique-se para poder carregar o arquivo';

		header('Location: ../index.php');
		exit();
	}	

	$erro = null;

			$request = array_map('trim', $_REQUEST);
			$request = filter_var_array($_REQUEST, 
				['idTarefa' => FILTER_VALIDATE_INT]
			);


	$idTarefa = $request['idTarefa'];
	if ($idTarefa == false)
		{
			$erro = "ID da tarefa não foi informado ou é inválido";
		}	
	else
	{
 		$arquivo = BuscaEntrega($idAlunoConectado , $idTarefa);
 		if($entrega != false)
 		{
 			$arq = $entrega['arquivo'];
 			unlink("../$arq");
 			ApagaTarefa($idAlunoConectado, $idTarefa);
 			
 		} 
 		
	}




?>