create database bd;
#drop database bd;
use bd;

Create table usuarios (
ID Int UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
login Varchar(30),
senha Varchar(40),
nome varchar(55),
cidade varchar(40),
numero_celular fixed(00000000000),

Primary Key (ID)) ENGINE = MyISAM;
--select * from usuarios;
create table carros(
 chassi Int not NULL,
 marca varchar (40),
 modelo varchar(40),
 ano int(4),
 cor varchar(40),
 combustivel varchar(40),
 primary key (chassi)
 );
 --select * from carros;


