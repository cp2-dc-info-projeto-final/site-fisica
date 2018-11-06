<?php

require_once('ConexãoBd.php');

function ListaTurmas() : array
{
	$bd = CriaConexãoBd();

	$resultado = $bd->query('SELECT * FROM Turmas');

	return $resultado->fetchAll();
}

function BuscaTurmaPorId(int $id) : array
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT * FROM Turmas WHERE id = :valId');

	$sql->bindValue(':valId', $id);

	$sql->execute();

	return $sql->fetch();
}

?>