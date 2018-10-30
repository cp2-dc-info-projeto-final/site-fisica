<?php
 
 function CriaConexãoBd()
	{
  	$bd = new PDO('mysql:host=localhost; dbname=fisica_com_higino; charset=utf8',
  	'fisica_com_higino',
  	'fisica');

		$bd->setAttribute( PDO::ATTR_ERRMODE,
		                  PDO::ERRMODE_EXCEPTION);

	return $bd; 
	
}


  function PesquisaEmail($email){

      $bd = CriarConexao();

      $sql = $bd -> prepare('SELECT email FROM usuario WHERE email = :email;');
      $sql -> bindValue(':email', $email);
      $sql -> execute();

      if ($sql -> rowCount() == 0){

        return 0;

      } else {

        return 1;

      }

    }

 function InsereUsuario($novousuario){

      $bd = CriarConexao();

      $sql = $bd -> prepare('

        INSERT INTO usuarios (nome, usuario, email, senha, confirmarsenha, termos_uso) VALUES

        (:nome, :usuario, :email, :senha, :confirmarsenha, :termos_uso);

      ');

      $novousuario['senha'] = password_hash($novousuario['senha'], PASSWORD_DEFAULT);

      $sql -> bindValue(':nome', $novousuario['nomeProprio']);
      $sql -> bindValue(':usuario', $novousuario['usuario']);
      $sql -> bindValue(':email', $novousuario['email']);
      $sql -> bindValue(':senha', $novousuario['senha']);
      $sql -> bindValue(':confirmarsenha', $novousuario['visibilidade']);

      $sql -> bindValue(':termos_uso', $novousuario['termosUso']);

      $sql -> execute();

    }
    
    function ProucuraHash($email){
      
      $bd = CriarConexao();
      
      $sql = $bd -> prepare('SELECT senha FROM usuario WHERE email = :email');
      $sql -> bindValue(':email', $email);
      $sql -> execute();
      
      if($sql -> rowCount() == 0){
        
        return 0;
        
      } else {
              
        $sql = $sql -> fetch();
        return $sql['senha'];
        
      }
      
    }
    
    function RelacionaNome($email){
      
      $bd = CriarConexao();
      
      $sql = $bd -> prepare('SELECT nome FROM usuario WHERE email = :email');
      $sql -> bindValue(':email', $email);
      $sql -> execute();
      
      $sql = $sql -> fetch();
      
      return($sql['nome']);
      
    }



?>