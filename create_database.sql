CREATE DATABASE agenda;
USE agenda;

CREATE TABLE contato (
  id INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  telefone VARCHAR(11)
);

INSERT INTO contato (nome,telefone) VALUE ('Joao','4130746262');
INSERT INTO contato (nome,telefone) VALUE ('Pedro','4130746262');
INSERT INTO contato (nome,telefone) VALUE ('Joaquim','4130746262');
INSERT INTO contato (nome,telefone) VALUE ('Maria','4130746262');
INSERT INTO contato (nome,telefone) VALUE ('Sebastiao','4130746262');
INSERT INTO contato (nome,telefone) VALUE ('Jose','4130746262');
INSERT INTO contato (nome,telefone) VALUE ('Erivaldo','4130746262');
INSERT INTO contato (nome,telefone) VALUE ('Uridalto','4130746262');

CREATE TABLE admin (
  id INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL,
  senha VARCHAR(255) NOT NULL
);

INSERT INTO admin (email,senha) VALUE ('bruno.correa.at@gmail.com','123456');