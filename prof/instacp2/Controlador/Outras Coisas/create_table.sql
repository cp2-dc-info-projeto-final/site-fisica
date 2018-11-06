CREATE TABLE usuarios(

  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(35) NOT NULL,
  sobrenome VARCHAR(35) NOT NULL,
  email VARCHAR(63) NOT NULL,
  senha VARCHAR(12) NOT NULL,
  data_nasc DATE NOT NULL,
  publicacoes INT NOT NULL,
  alertas_email BOOLEAN NOT NULL,
  termos_uso BOOLEAN NOT NULL

);
