<?php

  function CriarConexao(){

    $bd =  new PDO('mysql:host=localhost;dbname= fisica ;charset=utf8','fisica','');

    $bd -> setAttribute(PDO::ATTR_ERRMODE,
                      PDO::ERRMODE_EXCEPTION);

    return $bd;

  }
  
  function PesquisaEmail($email){

    $bd = CriarConexao();

    $sql = $bd -> prepare('SELECT email FROM usuarios WHERE email = :email;');
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

      INSERT INTO usuarios (nome, sobrenome, email, senha, data_nasc, publicacoes, alertas_email, termos_uso) VALUES

      (:nome, :sobrenome, :email, :senha, :data_nasc, :publicacoes, :alertas_email, :termos_uso);

    ');

    $novousuario['senha'] = password_hash($novousuario['senha'], PASSWORD_DEFAULT);

    $sql -> bindValue(':nome', $novousuario['nomeProprio']);
    $sql -> bindValue(':sobrenome', $novousuario['sobrenome']);
    $sql -> bindValue(':email', $novousuario['email']);
    $sql -> bindValue(':senha', $novousuario['senha']);
    $sql -> bindValue(':data_nasc', $novousuario['dataNasc']);
    $sql -> bindValue(':publicacoes', $novousuario['visibilidade']);
    $sql -> bindValue(':alertas_email', $novousuario['alertas_email']);
    $sql -> bindValue(':termos_uso', $novousuario['termosUso']);

    $sql -> execute();

  }
  
  function ProucuraHash($email){
	  
	  $bd = CriarConexao();
	  
	  $sql = $bd -> prepare('SELECT senha FROM usuarios WHERE email = :email');
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
	  
	  $sql = $bd -> prepare('SELECT nome FROM usuarios WHERE email = :email');
	  $sql -> bindValue(':email', $email);
	  $sql -> execute();
	  
	  $sql = $sql -> fetch();
	  
	  return($sql['nome']);
	  
  }

?>
