<?php

    $bd = new PDO('mysql:host=localhost;
    dbname=agenda_contatos;charset=utf8',
    'agenda_contatos',
    'gabbyfilhao'
    );

$bd -> setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);

/* $bd -> exec(
    'CREATE TABLE Contatos(
      id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
      nome VARCHAR(100) NOT NULL UNIQUE,
      tel VARCHAR(30) UNIQUE,
      email VARCHAR(255),
      dataNasc DATE
    );');

$bd->exec(
    "INSERT INTO Contatos(nome, tel, email, dataNasc) VALUES
    ('Grazi', '+55 21 9 88464529', 'grazi@gmail.com', '2005-06-21')"); */

/* $bd->exec(
    "INSERT INTO Contatos(nome, tel, email, dataNasc) VALUES

    ('Filhão', '+55 21 9 00001111', 'filhao@demais.com', '2001-09-17'),
    ('Gabby', '+55 21 9 11110000', 'gabby@centro.com', '2000-03-27')

    "); */

    $bd -> exec('

      DELETE FROM Contatos;

    ');


 ?>
