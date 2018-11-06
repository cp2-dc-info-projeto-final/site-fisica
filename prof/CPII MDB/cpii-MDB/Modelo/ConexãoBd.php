<?php

function CriaConexãoBd() : PDO
{
	$bd = new PDO('mysql:host=localhost;dbname=cpii-mdb;charset=utf8', 'cpii-mdb', '32#wlZ4');

	$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	return $bd;
}

?>