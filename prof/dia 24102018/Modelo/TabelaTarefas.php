<?php

require_once('ConexãoBd.php');

function BuscaTarefasAluno(array $aluno) : array
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT Tarefas.*, Entregas.data AS dataEntrega, Entregas.arquivo
	                     FROM Tarefas LEFT JOIN Entregas ON Tarefas.id = Entregas.idTarefa
	                     WHERE Tarefas.idTurma = :valIdTurma AND
	                           (Entregas.idAluno = :valIdAluno OR Entregas.idAluno IS NULL)');

	$sql->bindValue(':valIdTurma', $aluno['idTurma']);
	$sql->bindValue(':valIdAluno', $aluno['id']);

	$sql->execute();

	return $sql->fetchAll();
}


function EntregaTarefa(int $idAluno, int $idTarefa, string $arquivo, DateTime $data)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('REPLACE INTO Entregas (idAluno, idTarefa, arquivo, data)
	                     VALUES (:valIdAluno, :valIdTarefa, :valArquivo, :valData)');

	$sql->bindValue(':valIdAluno', $idAluno);
	$sql->bindValue(':valIdTarefa', $idTarefa);
	$sql->bindValue(':valArquivo', $arquivo);
	$sql->bindValue(':valData', $data->format('Y-m-d'));

	$sql->execute();
}

?>