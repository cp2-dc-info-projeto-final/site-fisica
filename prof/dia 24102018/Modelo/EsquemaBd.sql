CREATE TABLE Turmas (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	turma CHAR(5) NOT NULL                      -- IN301, IN303, 1101 etc.
);

CREATE TABLE Alunos (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(127) NOT NULL,
	email VARCHAR(191) NOT NULL UNIQUE,
	senha VARCHAR(60) NOT NULL,
	idTurma INT NOT NULL,

	FOREIGN KEY (idTurma) REFERENCES Turmas(id)
);

CREATE TABLE Tarefas (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	idTurma INT NOT NULL,
	título VARCHAR(127) NOT NULL,
	descrição TEXT NOT NULL,
	tipoArquivo VARCHAR(255) NOT NULL,
	dataLimite DATE NOT NULL,

	FOREIGN KEY (idTurma) REFERENCES Turmas(id)
);

CREATE TABLE Entregas (
	idAluno INT NOT NULL,
	idTarefa INT NOT NULL,
	arquivo VARCHAR(255),
	data DATE NOT NULL,

	PRIMARY KEY (idAluno, idTarefa),
	FOREIGN KEY (idAluno) REFERENCES Alunos(id),
	FOREIGN KEY (idTarefa) REFERENCES Tarefas(id)
);


INSERT INTO Turmas VALUES (1, 'IN201'), (2, 'IN302');

INSERT INTO Alunos VALUES
( 1, 'Ana Clara', 'ana@example.net', '$2y$10$Kg9h.VAh4eSxffKz8N26o.ipqITf/JajwDH6ElCC1p3lEElaq6AHS', 1 ),   -- Ac!9w1
( 2, 'Breno', 'breno@example.net', '$2y$10$ry4fZ8rYfqIgVmWcggd33uD9Q8nnETrhtxhWNK8TpG3a22C4EpsVa', 1 ),     -- iJ2@ac
( 3, 'Cristiano', 'cris@example.net', '$2y$10$gy0SNjJCJGgLKZKc5xONl.tbs22ETMAWirVdrDBLqHP/IJLVTTNhe', 2 ),  -- l93.xD
( 4, 'Daniela', 'dani@example.net', '$2y$10$Hkct3MYi5b8RuZ5t6cffpObhg1dHLEyF/xOepAc3kewlpl.77huju', 2 );    -- sCv&9u

INSERT INTO Tarefas VALUES
( 1, 2, 'Busca Binária', 'Implementar o algoritmo de busca binária em C#', 'text/plain', '2018-04-25' ),
( 2, 2, 'Fotos cotidiano', 'Tirar uma foto de alguma cena cotidiana sua que reflita algum os temas de ocupação e ordenaçaõ do espaço urbano abordados nas aulas de geografia', 'image/*', '2018-05-14'),
( 3, 2, 'Resenha de filme', 'Escolher um filme que você viu recentemente e fazer uma resenha sobre ele. Mínimo de 15 e máximo de 30 linhas', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2018-07-03' ),
( 4, 2, 'Seminário Eng. Software', '', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', '2018-09-30'),
( 5, 2, 'Projeto InstaCPII', 'Enviar os arquivos de código HTML, PHP, CSS etc.', 'application/zip', '2018-11-20'),
( 6, 1, 'Seminário BD', '', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', '2018-04-27');