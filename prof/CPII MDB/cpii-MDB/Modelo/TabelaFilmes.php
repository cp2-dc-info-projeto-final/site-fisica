<?php

require_once('ConexãoBd.php');

function listafilmes()
{
	$bd = CriaConexãoBd();

	$resultados = $bd ->prepare('SELECT * from Filmes');
	$resultados->execute();

	 return $resultados->fetchAll();

}
function BuscaFilmePorId(int $id) : array
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT Filmes.*, Gêneros.nome as gênero
	                     FROM Filmes
	                     INNER JOIN Gêneros ON Filmes.idGênero = Gêneros.id
	                     WHERE Filmes.id = :valId');

	$sql->bindValue(':valId', $id);

	$sql->execute();

	return $sql->fetch();
}

?>