<?php
function BuscaUsuárioPorId(int $id)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT * FROM Usuários WHERE id = :valId');

	$sql->bindValue(':valId', $id);

	$sql->execute();

	return $sql->fetch();
}



function BuscaUsuárioPorEmail(string $email)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT * FROM Usuários WHERE email = :valEmail');

	$sql->bindValue(':valEmail', $email);

	$sql->execute();

	return $sql->fetch();
}



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