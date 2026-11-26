CREATE DATABASE crud;

USE crud;

CREATE TABLE tarefa
(
id int primary key auto_increment,
descricao varchar(200) not null,
data_entrega date,
prioridade varchar(50),
responsavel varchar(100)
)