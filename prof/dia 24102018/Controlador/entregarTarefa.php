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
	elseif (array_key_exists('arquivo', $_FILES) == false) 
		{
			$erro = "Arquivo não informado";
		}
	else {
			$arq = $_FILES['arquivo'];

			
			$pasta = "carregamentos/$idAlunoConectado";
			mkdir("../$pasta");

			$nomeOrig = $arq['name'];	
			$nomeFinal = "$idTarefa-$nomeOrig";
			$caminhoCompleto = "$pasta/$nomeFinal";




				if ($arq['error'] != UPLOAD_ERR_OK)
				{
					$erro = "Erro ao carrega arquivo";	
				}

				elseif (move_uploaded_file($arq['tmp_name'],
										"../$caminhoCompleto") == false)
				{
					$erro = ' Erro ao salvar o arquivo no servidor';
				}
		 

			//PENDENTE: Validar se não tem virus
			//PENDENTE: Validar se é do tipo correto	
		}	


if ($erro == null)
{
	EntregaTarefa($idAlunoConectado,
					$idTarefa,
					$caminhoCompleto,
					new DateTime()
	);
}
else
{
	$_SESSION['erroCarregamento'] = $erro;
}

Redireciona('../index.php');

$bd-> conect

?>