<?php

require_once('../Utils.php');

session_start();
unset($_SESSION['idAlunoConectado']);

Redireciona('../index.php');

?>