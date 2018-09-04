create table area(
	id_area int,
	nome varchar (200), 
	primary key (id_area)
);

create table arquivo(
	id_arquivo int,
	conteudo varchar (200),
	id_area int,
	primary key (id_arquivo),
	foreign key (id_area) references (area)
);

create table link(
	id_link int,
	endereco varchar (200),
	id_area,
	primary key (id_link),
	foreign key (id_area) references (area)
);

create table usuario(
	id_usuario int,
	nome varchar (200),
	senha varchar(16),
	matricula varchar(9),
	primary key (id_usuario)
);

create table aluno(
	id_aluno int,
	primary key (id_aluno),
	foreign key (id_usuario) references (usuario)
);

create table professor(
	id_professor int,
	primary key (id_professor),
	foreign key (id_usuario) references (usuario)
);

create table resposta(
	id_resposta int,
	conteudo varchar (300),
	dia date ,
	id_usuario int,
	primary key (id_resposta),
	foreign key (id_usuario) references (aluno)
);

create table avaliacao (
	id_resposta int,
	avaliacao boolean,
	id_usuario int,
	primary key (id_resposta, id_usuario),
	foreign key (id_resposta) references (resposta),
	foreign key (id_usuario) references (usuario)
);

create table perguntas (
	id_pergunta int,
	conteudo varchar(150),
	id_area int,
	id_usuario int,
	id_resposta int,
	primary key (id_pergunta),
	foreign key (id_area) references (area),
	foreign key (id_usuario) references (aluno),
	foreign key (id_resposta) references (resposta)
);
