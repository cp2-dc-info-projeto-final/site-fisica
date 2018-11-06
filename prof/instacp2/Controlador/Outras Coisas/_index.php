<?php

    $bd = new PDO('mysql:host=localhost;
    dbname=agenda_contatos;charset=utf8',
    'agenda_contatos',
    'gabbyfilhao'
    );

$bd -> setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);

$bd -> exec(
    'CREATE TABLE Contatos(
      id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
      nome VARCHAR(100) NOT NULL UNIQUE,
      tel VARCHAR(30) UNIQUE,
      email VARCHAR(255),
      dataNasc DATE
    );');


 ?>
