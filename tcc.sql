create table area(
	id_area int,
	nome string, 
	primary key (id_area)
);
create table arquivo(
	id_arquivo int,
	conteudo string,
	id_area int,
	primary key (id_arquivo),
	foreign key (id_area) references (area)
);
create table link(
	id_link int,
	endereco string,
	id_area,
	primary key (id_link),
	foreign key (id_area) references (area)
	
);
create table (
	
);