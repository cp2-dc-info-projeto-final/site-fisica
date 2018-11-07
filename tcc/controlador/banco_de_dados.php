<?php

function CriaConexãoBd()
{
  $bd = new PDO('mysql:host=localhost; dbname=fisica_com_higino; charset=utf8',
  'fisica_com_higino',
  'fisica');

		$bd->setAttribute(PDO::ATTR_ERRMODE,
		                  PDO::ERRMODE_EXCEPTION);

	return $bd;
}


function dados do usuario(){
$sql = 'CREATE TABLE Usuario (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL UNIQUE,
    usuario VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255),
    senha VARCHAR (60),
    confirmarsenha VARCHAR (60),
    visibilidadedePublicacoes int not NULL

) '; 






?>
