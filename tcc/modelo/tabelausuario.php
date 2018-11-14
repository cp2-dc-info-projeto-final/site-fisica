<?php
  
require_once('acesso_ao_banco.php');
   
  function BuscaUsuarioPorId(int $id)
  {
  
    $bd = CriaConexãoBd();

    $sql = $bd->prepare('SELECT * FROM usuarios WHERE id = :valId');

    $sql->bindValue(':valId', $id);

    $sql->execute();

    return $sql->fetch();
  }

  function BuscaUsuarioPorEmail(string $email)
  {
  
    $bd = CriaConexãoBd();

    $sql = $bd->prepare('SELECT * FROM usuarios WHERE email = :valEmail');

    $sql->bindValue(':valEmail', $email);

    $sql->execute();

    return $sql->fetch();
  }

  function buscaporidentificador(string $matricula)
  {
  
    $bd = CriaConexãoBd();

    $sql = $bd->prepare('SELECT * FROM usuarios WHERE email = :valid OR maticula = :valid');

    $sql->bindValue(':valid', $matricula);

    $sql->execute();

    return $sql->fetch();
  }





  function PesquisaEmail($email)
  {

    $bd = CriaConexãoBd();
    $sql = $bd -> prepare('SELECT email FROM usuarios WHERE email = :email;');
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
      function PesquisaUsuario($usuario)
  {

    $bd = CriaConexãoBd();
    $sql = $bd -> prepare('SELECT email FROM usuarios WHERE usuario = :usuario;');
    $sql -> bindValue(':usuario', $usuario);
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

  function InsereAluno($novousuario)
  {

       $bd = CriaConexãoBd();
    $sql = $bd -> prepare('INSERT INTO usuarios(nome, usuario, email, senha , matricula) VALUES (:valnome, :valusuario, :valemail, :valsenha , NULL)');

    $hash = password_hash($novousuario['senha'], PASSWORD_DEFAULT);

    $sql -> bindValue(':valnome', $novousuario['nome']);
    $sql -> bindValue(':valusuario', $novousuario['usuario']);
    $sql -> bindValue(':valemail', $novousuario['email']);
    $sql -> bindValue(':valsenha', $hash);
    $sql -> execute();

    return $bd->lastInsertid();

  }
    
  function ProucuraHash($email)
  {
      
       $bd = CriaConexãoBd();
      
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
         $bd = CriaConexãoBd(); 
    $sql = $bd -> prepare('SELECT nome FROM usuario WHERE email = :email');
    $sql -> bindValue(':email', $email);
    $sql -> execute();
    $sql = $sql -> fetch();
      
    return($sql['nome']);
      
  }



?>