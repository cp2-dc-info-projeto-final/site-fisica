<?php

	function BotãoRemoverAvaliação(int $idFilme)
	{
?>
		<form action="Controlador/removerAvaliação.php" method="POST">
			<input name="local" type="hidden" value="<?= $_SERVER['REQUEST_URI'] ?>">
			<input type="submit" value="Remover" class="btn btn-sm btn-outline-danger">
		</form>
<?php } ?>