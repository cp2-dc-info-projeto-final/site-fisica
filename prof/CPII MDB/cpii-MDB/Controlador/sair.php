<?php

require_once('../Utils.php');

session_start();
unset($_SESSION['idUsuárioConectado']);
$local = $_REQUEST['local'];

Redireciona($local);

?>