<?php

/**
 * `session_start()` deve ter sido chamado *antes* desta função.
 * O registro identificado por $chave é removido de `$_SESSION`.
 * 
 * @param string $chave - Chave do registro em `$_SESSION` que se deseja recuperar e remover.
 * @return null|mixed Retorna o valor para a $chave em $_SESSION.
 *                    Caso a $chave não exista, retorna `null`.
 */
function ExtraiRegistroSessão(string $chave)
{
	if (array_key_exists($chave, $_SESSION))
	{
		$erro = $_SESSION[$chave];
		unset($_SESSION[$chave]);

		return $erro;
	}
	else
	{
		return null;
	}
}

/**
 * A execução do _script_ é interrompida.
 * @param string $uri - Endereço para o qual o usuário deve ser redirecionado.
 */
function Redireciona(string $uri)
{
	header("Location: $uri");
	exit();
}

?>