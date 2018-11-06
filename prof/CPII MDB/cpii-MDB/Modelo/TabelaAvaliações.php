<?php

require_once('ConexãoBd.php');

function ListaAvaliaçõesFilme(int $idFilme) : array
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT Avaliações.*,
	                            Usuários.nome AS nomeUsuário,
	                            Usuários.estado AS estadoUsuário
	                     FROM Avaliações
	                     INNER JOIN Usuários ON Usuários.id = Avaliações.idUsuário
	                     WHERE idFilme = :valIdFilme');

	$sql->bindValue(':valIdFilme', $idFilme);

	$sql->execute();

	return $sql->fetchAll();
}

function ListaAvaliaçõesUsuário(int $idUsuário) : array
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT Avaliações.*,
	                            Filmes.títuloPor as títuloFilme,
	                            Filmes.cartaz as cartazFilme
	                     FROM Avaliações
	                     INNER JOIN Filmes ON Filmes.id = Avaliações.idFilme
	                     WHERE idUsuário = :valIdUsuario');

	$sql->bindValue(':valIdUsuario', $idUsuário);

	$sql->execute();

	return $sql->fetchAll();
}

function InsereAvaliação(int $idUsuário, int $idFilme, int $nota, ?string $comentários)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('REPLACE INTO Avaliações (idUsuário, idFilme, nota, comentários)
	                     VALUES (:valIdUsuario, :valIdFilme, :valNota, :valComentarios)');

	$sql->bindValue(':valIdUsuario', $idUsuário);
	$sql->bindValue(':valIdFilme', $idFilme);
	$sql->bindValue(':valNota', $nota);
	$sql->bindValue(':valComentarios', $comentários);

	$sql->execute();
}

function RemoveAvaliação(int $idUsuário, int $idFilme)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('DELETE FROM Avaliações
	                     WHERE idUsuário = :valIdUsuario
	                     AND idFilme = :valIdFilme');

	$sql->bindValue(':valIdUsuario', $idUsuário);
	$sql->bindValue(':valIdFilme', $idFilme);

	$sql->execute();
}

function CalculaNotaFilme(array $avaliações) : ?float
{
	if (empty($avaliações))
	{
		return null;
	}

	$nota = 0;
	foreach ($avaliações as $a)
	{
		$nota += $a['nota'];
	}

	$média = $nota / count($avaliações);

	return round($média, 1);
}

?>