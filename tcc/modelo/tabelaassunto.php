<?php
require_once('acesso_ao_banco.php');


function BuscaAssuntoPorId($id)
{

  $bd = CriaConexãoBd();

  $sql = $bd->prepare('SELECT * FROM assuntos WHERE id = :valId');

  $sql->bindValue(':valId', $id);

  $sql->execute();

  return $sql->fetch();
}



function add_assuntos($nome)
{

	$sql = $bd->prepare('INSERT INTO assuntos ( nome)
	                     VALUES (:valnome)');


	$sql->bindValue(':valnome', $assuntos['nome']);
  $sql->execute();
}

 ?>
