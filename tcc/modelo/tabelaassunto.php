<?php
require_once('acesso_ao_banco.php');


function ListaAssuntos($id)
{

  $bd = CriaConexãoBd();

  $sql = $bd->prepare('SELECT * FROM assuntos WHERE id = :valId');

  $sql->bindValue(':valId', $id);

  $sql->execute();

  return $sql->fetchAll();
}



function add_assuntos($novoassunto)
{
  $bd = CriaConexãoBd();
	$sql = $bd -> prepare('INSERT INTO assuntos(nome) VALUES (:valnome)');
  $sql->bindValue(':valnome', $novoassunto['nome']);
  $sql->execute();
  return $bd->lastInsertid();
}

 ?>
