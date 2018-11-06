<?php

function CriaConexãoBd() : PDO
{
	$bd = new PDO('mysql:host=localhost;dbname=cpii-tarefas;charset=utf8', 'CPII-Tarefas', '3#wZ42p');

	$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	return $bd;
}

?>