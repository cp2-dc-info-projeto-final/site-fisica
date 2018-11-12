
<?php
function CriaConexãoBd()
{
  $bd = new PDO('mysql:host=localhost; dbname=cadastro; charset=utf8',
  'cadastro',
  '12345qwe');
		$bd->setAttribute( PDO::ATTR_ERRMODE,
		                  PDO::ERRMODE_EXCEPTION);
return $bd; 
	
}
?>