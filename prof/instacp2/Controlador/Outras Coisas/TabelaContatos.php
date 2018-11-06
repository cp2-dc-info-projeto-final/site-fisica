<?php

function CriarConexão(){

  $bd = new PDO('mysql:host=localhost;dbname=agenda_contatos;charset=utf8','agenda_contatos','gabbyfilhao');

  $bd -> setAttribute(PDO::ATTR_ERRMODE,
                      PDO::ERRMODE_EXCEPTION);

  return $bd;

}

function ListarContatos(){

  $bd = CriarConexão();

  $resultados = $bd -> query('SELECT * FROM Contatos ORDER BY nome ASC');

  return $resultados -> fetchAll();

}

function InserirContato($dados){

  $bd = CriarConexão();

  $nome = $dados['nome'];
  $email = $dados['email'];
  $tel = $dados['tel'];
  $dataNasc = $dados['dataNasc'];

  $sql = $bd -> prepare('

    INSERT INTO Contatos (nome, tel, email, dataNasc) VALUES
    (:nome, :tel, :email, :dataNasc);

  ');

  $sql -> bindValue(':nome', $nome);
  $sql -> bindvalue(':tel', $tel);
  $sql -> bindValue(':email', $email);
  $sql -> bindValue(':dataNasc', $dataNasc);

  $sql -> execute();

}

?>
