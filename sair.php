<?php

	session_start();
	
	unset($_SESSION['emailLogado']);
	
	header('Location: ../index.php');

?>
