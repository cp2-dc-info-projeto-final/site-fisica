CREATE TABLE Usuários (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(127) NOT NULL,
	-- email VARCHAR(255) NOT NULL UNIQUE,        -- https://stackoverflow.com/a/1814594
	email VARCHAR(191) NOT NULL UNIQUE,
	senha VARCHAR(60) NOT NULL,
	estado CHAR(2) NOT NULL                      -- Sigla (RJ, ES, BA etc.)
);

CREATE TABLE Gêneros (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(127)
);

CREATE TABLE Filmes (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	títuloPor VARCHAR(127) NOT NULL,
	títuloOrig VARCHAR(127),
	cartaz VARCHAR(255) NOT NULL,
	ano INT NOT NULL,
	país CHAR(3) NOT NULL,                       -- Código ISO 3166-1 alfa-2 (BRA, ITA, JPN etc.)
	idGênero INT NOT NULL,
	classificaçãoIndicativa INT NOT NULL,        -- Classind (0, 10, 12, 14, 16, 18)

	FOREIGN KEY (idGênero) REFERENCES Gêneros (id)
);

CREATE TABLE Avaliações (
	idUsuário INT NOT NULL,
	idFilme INT NOT NULL,
	nota INT NOT NULL,                           -- De 0 a 5
	comentários TEXT,

	PRIMARY KEY (idUsuário, idFilme),
	FOREIGN KEY (idUsuário) REFERENCES Usuários (id),
	FOREIGN KEY (idFilme) REFERENCES Filmes (id)
);


INSERT INTO Usuários VALUES
( 1, 'Ana Clara', 'ana@example.net', '$2y$10$Kg9h.VAh4eSxffKz8N26o.ipqITf/JajwDH6ElCC1p3lEElaq6AHS', 'RJ' ),   -- Ac!9w1
( 2, 'Breno', 'breno@example.net', '$2y$10$ry4fZ8rYfqIgVmWcggd33uD9Q8nnETrhtxhWNK8TpG3a22C4EpsVa', 'ES' ),     -- iJ2@ac
( 3, 'Cristiano', 'cris@example.net', '$2y$10$gy0SNjJCJGgLKZKc5xONl.tbs22ETMAWirVdrDBLqHP/IJLVTTNhe', 'BA' ),  -- l93.xD
( 4, 'Daniela', 'dani@example.net', '$2y$10$Hkct3MYi5b8RuZ5t6cffpObhg1dHLEyF/xOepAc3kewlpl.77huju', 'SC' );    -- sCv&9u

INSERT INTO Gêneros VALUES
( 1, 'Ação' ),
( 2, 'Comédia' ),
( 3, 'Suspense'),
( 4, 'Ficção Científica'),
( 5, 'Fantasia'),
( 6, 'Terror'),
( 7, 'Drama');

INSERT INTO Filmes VALUES
(
	1, 'Vidas Sêcas', NULL,
	'https://m.media-amazon.com/images/M/MV5BOGUxZTViNTYtMThhMC00OGFiLWJlY2UtZTRiMGQ3OGY1YTJmXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_.jpg',
	1963, 'BRA', 7, 0
),
(
	2, 'O Som ao Redor', NULL,
	'https://m.media-amazon.com/images/M/MV5BMjAzNzg2MzEwN15BMl5BanBnXkFtZTcwMzY4Njc4Nw@@._V1_.jpg',
	2013, 'BRA', 7, 16
),
(
	3, 'O Homem do Futuro', NULL,
	'https://m.media-amazon.com/images/M/MV5BNzFmZDc3ODQtMDBkNy00OTY2LTlhODItN2NhYzI3ZDIzOWY3XkEyXkFqcGdeQXVyMTY2MzYyNzA@._V1_SY1000_CR0,0,673,1000_AL_.jpg',
	2011, 'BRA', 2, 12
),
(
	4, 'Em Ritmo de Fuga: Baby Driver', 'Baby Driver',
	'https://m.media-amazon.com/images/M/MV5BMjM3MjQ1MzkxNl5BMl5BanBnXkFtZTgwODk1ODgyMjI@._V1_SY1000_CR0,0,674,1000_AL_.jpg',
	2017, 'EUA', 1, 14
),
(
	5, 'Assassinato no Expresso do Oriente', 'Murder on the Orient Express',
	'https://m.media-amazon.com/images/M/MV5BMTAxNDkxODIyMDZeQTJeQWpwZ15BbWU4MDQ2Mjg4NDIy._V1_SY1000_CR0,0,674,1000_AL_.jpg',
	2017, 'EUA', 3, 12
),
(
	6, 'Relacionamento à Francesa', 'Papa ou maman',
	'https://m.media-amazon.com/images/M/MV5BYzRmNmI1ZWEtY2EyYS00NjNkLWI5OGMtNjg3NTBjMThhOTIyXkEyXkFqcGdeQXVyNTc3MjM3OTA@._V1_SY1000_SX736_AL_.jpg',
	2015, 'FRA', 2, 0
),
(
	7, 'O Fabuloso Destino de Amélie Poulain', "Le fabuleux destin d'Amélie Poulain", 'https://m.media-amazon.com/images/M/MV5BNDg4NjM1YjMtYmNhZC00MjM0LWFiZmYtNGY1YjA3MzZmODc5XkEyXkFqcGdeQXVyNDk3NzU2MTQ@._V1_SY1000_CR0,0,666,1000_AL_.jpg',
	2002, 'FRA', 2, 14
),
(
	8, 'Metrópolis', 'Metropolis', 'https://m.media-amazon.com/images/M/MV5BMTg5YWIyMWUtZDY5My00Zjc1LTljOTctYmI0MWRmY2M2NmRkXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_.jpg',
	1927, 'DEU', 4, 0
),
(
	9, 'Corra, Lola, Corra', 'Lola rennt', 'https://m.media-amazon.com/images/M/MV5BMGY3MDljOWUtMTMwNy00YjIyLWFlNWUtMTJhYjA4NzIwNTIyXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_SY1000_SX708_AL_.jpg',
	1999, 'DEU', 3, 12
),
(
	10, 'A Viagem de Chihiro', '千と千尋の神隠し - Sen to Chihiro no Kamikakushi', 'https://m.media-amazon.com/images/M/MV5BOGJjNzZmMmUtMjljNC00ZjU5LWJiODQtZmEzZTU0MjBlNzgxL2ltYWdlXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_SY1000_CR0,0,675,1000_AL_.jpg',
	2001, 'JPN', 5, 0
),
(
	11, 'O Grito', '呪怨 - Juon',
	'https://m.media-amazon.com/images/M/MV5BYjNjMWNhZjctYmQzYS00M2ZmLWEzZTktZTJjZDI0NmM0MmMzXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_.jpg',
	2002, 'JPN', 5, 14
),
(
	12, 'Central do Brasil', NULL,
	'https://m.media-amazon.com/images/M/MV5BODMxMTEyZmQtODU1OC00Y2I5LWI3NmMtOGFiZTcxNTVmOTQ5XkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_.jpg',
	1998, 'BRA', 7, 12
),
(
	13, 'Paraísos Artificiais', NULL,
	'https://m.media-amazon.com/images/M/MV5BMjMwNzg5NjU5Nl5BMl5BanBnXkFtZTcwNDE2MzQwOA@@._V1_.jpg',
	2012, 'BRA', 7, 16
);

INSERT INTO Avaliações VALUES
( 1,  1, 4, 'O realismo e o uso pouco convencional da trilha sonora causam um impacto no espectador que supera o baixo orçamento da produção' ),
( 3,  3, 4, 'Muito bom! A trilha sonora é ótima.' ),
( 2,  3, 1, 'O roteiro é muito previsível, e as partes de comédia não são muito engraçadas.' ),
( 4, 10, 5, 'Estória muito emocionante, e animação mais bonita ainda.' ),
( 1, 10, 4, 'Filme muito bom, mas um pouco longo demais para uma animação.' ),
( 2,  10, 5, 'Enredo bastante misterioso e original.' );