<?php

require_once('ConexãoBd.php');

const UFS = [ 'AC', 'AL', 'AP', 'AM', 'BA', 'CE',
	          'DF', 'ES', 'GO', 'MA', 'MT', 'MS',
	          'MG', 'PA', 'PB', 'PR', 'PE', 'PI',
	          'RJ', 'RN', 'RS', 'RO', 'RR', 'SC',
	          'SP', 'SE', 'TO' ];


/**
 * Busca um usuário cadastrado no BD a partir do seu id.
 * @param int $id - Id do usuário a ser buscado no BD.
 * @return array|false Retorna um vetor com todas as informações do usuário
 *                     encontrado (`id`, `nome`, `email` etc.).
 *                     Retorna `false` se não houver um usuário com o $id informado.
 */
function BuscaUsuárioPorId(int $id)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT * FROM Usuários WHERE id = :valId');

	$sql->bindValue(':valId', $id);

	$sql->execute();

	return $sql->fetch();
}


/**
 * Busca um usuário cadastrado no BD a partir do seu endereço de e-mail.
 * @param string $email - Endereço de e-mail do usuário a ser buscado no BD.
 * @return array|false Retorna um vetor com todas as informações do usuário
 *                     encontrado (`id`, `nome`, `email` etc.).
 *                     Retorna `false` se não houver um usuário com o $email informado.
 */
function BuscaUsuárioPorEmail(string $email)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT * FROM Usuários WHERE email = :valEmail');

	$sql->bindValue(':valEmail', $email);

	$sql->execute();

	return $sql->fetch();
}


/**
 * Insere um novo usuário no BD.
 * @param array $dadosUsuário - Dados do novo usuário a ser inserido.
 * @return int Retorna o `id` do novo usuário no BD.
 */
function InsereUsuário(array $dadosUsuário) : int
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('INSERT INTO Usuários (nome, email, senha, estado)
	                     VALUES (:valNome, :valEmail, :valSenha, :valEstado)');

	$sql->bindValue(':valNome', $dadosUsuário['nome']);
	$sql->bindValue(':valEmail', $dadosUsuário['email']);
	$sql->bindValue(':valSenha', $dadosUsuário['senha']);
	$sql->bindValue(':valEstado', $dadosUsuário['estado']);

	$sql->execute();

	return $bd->lastInsertId();
}

?>