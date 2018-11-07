<?php
 
  function BuscaUsuárioPorId(int $id)
  {
  
    $bd = CriaConexãoBd();

    $sql = $bd->prepare('SELECT * FROM Usuários WHERE id = :valId');

    $sql->bindValue(':valId', $id);

    $sql->execute();

    return $sql->fetch();
  }

  function BuscaUsuárioPorEmail(string $email)
  {
  
    $bd = CriaConexãoBd();

    $sql = $bd->prepare('SELECT * FROM Usuários WHERE email = :valEmail');

    $sql->bindValue(':valEmail', $email);

    $sql->execute();

    return $sql->fetch();
  }



  function PesquisaEmail($email)
  {

    $bd = CriarConexao();

    $sql = $bd -> prepare('SELECT email FROM usuario WHERE email = :email;');
    $sql -> bindValue(':email', $email);
    $sql -> execute();

    if ($sql -> rowCount() == 0)
    {

      return 0;

    } 
    else 
    {

      return 1;

    }

  }

  function InsereUsuario($novousuario)
  {

    $bd = CriarConexao();

    $sql = $bd -> prepare('

      INSERT INTO usuarios (nome, usuario, email, senha, confirmarsenha, termos_uso) VALUES

      (:nome, :usuario, :email, :senha, :confirmarsenha, :termos_uso);

    ');

    $novousuario['senha'] = password_hash($novousuario['senha'], PASSWORD_DEFAULT);

    $sql -> bindValue(':nome', $novousuario['nome']);
    $sql -> bindValue(':usuario', $novousuario['usuario']);
    $sql -> bindValue(':email', $novousuario['email']);
    $sql -> bindValue(':senha', $novousuario['senha']);
    $sql -> bindValue(':confirmarsenha', $novousuario['confirmarsenha']);
    $sql -> bindValue(':termos_uso', $novousuario['termos_uso']);
    $sql -> execute();

    return $bd->lastInsertid();

  }
    
  function ProucuraHash($email)
  {
      
    $bd = CriarConexao();
      
    $sql = $bd -> prepare('SELECT senha FROM usuario WHERE email = :email');
    $sql -> bindValue(':email', $email);
    $sql -> execute();
      
    if($sql -> rowCount() == 0)
    {
        
      return 0;
        
    } 
    else 
    {
              
      $sql = $sql -> fetch();
      return $sql['senha'];
        
    }
      
  }
    
  function RelacionaNome($email)
  {
      
    $bd = CriarConexao(); 
    $sql = $bd -> prepare('SELECT nome FROM usuario WHERE email = :email');
    $sql -> bindValue(':email', $email);
    $sql -> execute();
    $sql = $sql -> fetch();
      
    return($sql['nome']);
      
  }



?>