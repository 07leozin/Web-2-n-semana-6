create database bebidas_db2;

use bebidas_db2;

create table bebidas(
    id int primary key AUTO_INCREMENT,
    nome varchar(50),
    tipo varchar(30),
    preco float
);