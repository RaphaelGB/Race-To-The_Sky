-- Criando o banco de dados que será utilizado
-- create database BD_JOGO;


-- Colocando o banco em uso
-- use BD_JOGO;

-- Criando a tabela desenvolvedor onde ficará salvo o login dos desenvolvedores
create table TB_DESENVOLVEDOR 
(TB_DESENVOLVEDOR_ID integer not null auto_increment primary key,
TB_DESENVOLVEDOR_NOME varchar(40) not null,
TB_DESENVOLVEDOR_SENHA integer not null
);

-- Criando a tabela cenario que terá uma chave estrangeira da tabela desenvolvedor
create table TB_CENARIO
(TB_CENARIO_ID integer not null primary key auto_increment,
TB_CENARIO_IMG blob not null,
TB_CENARIO_NOME varchar(50) not null,
TB_DESENVOLVEDOR_ID integer not null,
constraint PK_DESENVOLVEDOR_FK_CENARIO
foreign key (TB_DESENVOLVEDOR_ID)
references TB_DESENVOLVEDOR(TB_DESENVOLVEDOR_ID)
);

-- Criando a tabela personagem com chave estrangeira da tabela desenvolvedor
create table TB_PERSONAGEM
(TB_PERSONAGEM_ID integer not null primary key auto_increment,
TB_PERSONAGEM_IMAGEM blob not null,
TB_PERSONAGEM_NOME varchar(30) not null,
TB_DESENVOLVEDOR_ID integer not null,
constraint PK_DESENVOLVEDOR_FK_PERSONAGEM
foreign key (TB_DESENVOLVEDOR_ID)
references TB_DESENVOLVEDOR(TB_DESENVOLVEDOR_ID)
);

-- Criando a tabela historia com relação com a tabela personagens, criando assim uma chave estrangeira
create table TB_HISTORIA
(TB_HISTORIA_ID integer not null auto_increment primary key,
TB_HISTORIA_DESCRICAO varchar(255) not null,
TB_PERSONAGEM_ID integer not null,
constraint PK_PERSONAGEM_FK_HISTORIA
foreign key (TB_PERSONAGEM_ID)
references TB_PERSONAGEM(TB_PERSONAGEM_ID)
);

-- Criando a tabela do usuario que vai armazenar o login do usuario no site
create table TB_USUARIO 
(TB_USUARIO_ID integer not null primary key auto_increment,
TB_USUARIO_NOME varchar(100) not null,
TB_USUARIO_USERNAME varchar(30) unique not null,
TB_USUARIO_SENHA integer not null,
TB_USUARIO_TELEFONE varchar(20) unique not null,
TB_USUARIO_EMAIL varchar(200) unique not null
);


-- Criando a tabela comentario que possui uma chave estrangeira da tabela usuario
create table TB_COMENTARIO
(TB_COMENTARIO_ID integer not null primary key auto_increment,
TB_COMENTARIO_DESCRICAO varchar(255) not null,
TB_COMENTARIO_TITLE varchar (200) not null,
TB_COMENTARIO_ESTRELAS varchar(2) not null,
TB_USUARIO_ID integer not null,
constraint PK_USUARIO_FK_COMENTARIO
foreign key (TB_USUARIO_ID)
references TB_USUARIO(TB_USUARIO_ID)
);
-- Criando a tabela player onde ficarão salvos dados do jogador
create table TB_PLAYER
(TB_PLAYER_ID integer not null primary key auto_increment,
TB_PLAYER_NOME varchar(30) not null,
TB_PLAYER_TEMPO varchar(10)
);

-- Criando a tabela das questões que vão armazenar as questões do jogo
create table TB_QUESTOES
(TB_QUESTOES_ID integer not null primary key auto_increment,
TB_QUESTOES_PERGUNTA varchar(15) not null,
TB_QUESTOES_CORRETA varchar(15) not null,
TB_QUESTOES_ALTERNATIVA_1 varchar(15) not null,
TB_QUESTOES_ALTERNATIVA_2 varchar(15) not null
);
insert into TB_USUARIO (
TB_USUARIO_NOME,
TB_USUARIO_USERNAME,
TB_USUARIO_SENHA,
TB_USUARIO_TELEFONE,
TB_USUARIO_EMAIL
) values
(
"Agnaldo de Sousa",
"DeSousa",
897645312,
"(11) 78423-4231",
"Ag@yahoo.com"
);

insert into TB_USUARIO (
TB_USUARIO_NOME,
TB_USUARIO_USERNAME,
TB_USUARIO_SENHA,
TB_USUARIO_TELEFONE,
TB_USUARIO_EMAIL
) values
(
"Arnaldo",
"Arn",
894265312,
"(11) 78213-4231",
"Arn@yahoo.com"
);
insert into TB_USUARIO (
TB_USUARIO_NOME,
TB_USUARIO_USERNAME,
TB_USUARIO_SENHA,
TB_USUARIO_TELEFONE,
TB_USUARIO_EMAIL
) values
(
"Michele",
"Mi",
897641222,
"(11) 79223-4231",
"Mi@gmail.com"
);
insert into TB_USUARIO (
TB_USUARIO_NOME,
TB_USUARIO_USERNAME,
TB_USUARIO_SENHA,
TB_USUARIO_TELEFONE,
TB_USUARIO_EMAIL
) values
(
"Magnus Carlos",
"Carlinhos",
123456789,
"(11) 78423-4141",
"Magnus@hotmail.com"
);

insert into TB_USUARIO (
TB_USUARIO_NOME,
TB_USUARIO_USERNAME,
TB_USUARIO_SENHA,
TB_USUARIO_TELEFONE,
TB_USUARIO_EMAIL
) values
(
"Raphael Gomes",
"Senfurato",
123456789,
"(11) 78423-9431",
"rgbatista@gmail.com"
);

/* delete tb_comentario
delete from tb_comentario where TB_COMENTARIO_ID = 3;*/

 insert into TB_COMENTARIO (
        TB_COMENTARIO_DESCRICAO,
        TB_COMENTARIO_TITLE,
        TB_COMENTARIO_ESTRELAS,
        TB_USUARIO_ID
        ) values
        ('Muito bom o jogo','Amei demais','5', 1),('Divertido','Amei demais','5', 2),
        ('Mediano','Mais ou menos','3', 3),('Interessante','Incrível','4', 1),
        ('Mal organizado','Ruim','2', 2),('Interativo e extraordinário','Amei demais','5', 1);

select * from TB_COMENTARIO;
select * from TB_USUARIO;
 
Select C.TB_COMENTARIO_ID as ID, 
C.TB_COMENTARIO_TITLE as Title,
 C.TB_COMENTARIO_DESCRICAO as Descric, 
 C.TB_COMENTARIO_ESTRELAS as Estr,
 U.TB_USUARIO_NOME as nome
from TB_COMENTARIO as C
inner join TB_USUARIO as U
on U.TB_USUARIO_ID = C.TB_USUARIO_ID
Where C.TB_COMENTARIO_ID = 1;

select count(TB_COMENTARIO.TB_COMENTARIO_ID) as QUANT from TB_COMENTARIO;

select * from TB_USUARIO;