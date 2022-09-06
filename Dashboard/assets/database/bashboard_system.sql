-- Banco de dados Sistema Solalux

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Criação do banco de dados
CREATE DATABASE bashboard_system;

USE bashboard_system;


--
-- Criação de tabelas
--

CREATE TABLE `tb_sys_admin.user` ( -- Tabela Usuários Funcionarios
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_user` VARCHAR(13) NOT NULL,
    `nome` VARCHAR(100) NOT NULL,
    `data_nasc` DATE NOT NULL,
    `login` VARCHAR(30) NOT NULL,
    `password` VARCHAR(33) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `contato` VARCHAR(15) NOT NULL,
    `photo_user` VARCHAR(30),
    `status` VARCHAR(10) NOT NULL,
    `database` VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_sys_admin.user` (`id`, `id_user`, `nome`, `data_nasc`, `login`, `password`, `email`, `contato`, `status`) 
    VALUES (
        1,
        '5621b5a37b100', 
        'Valdean Souza', 
        '2000-05-03',
        'spark', 
        '7bb49eecce79a190494fed8f42acb928', 
        'mateus@gmail.com', 
        '(92) 99296-1661',
        'Ativo'
    );


-- Settings

CREATE TABLE `tb_sys_settigns.produto_brand` ( -- Tabela Settigns marcas
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `brand` VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_sys_settigns.produto_category` ( -- Tabela Settigns marcas
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `category` VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_sys_settigns.produto_color` ( -- Tabela Settigns marcas
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `color` VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_sys_settigns.produto_occasion` ( -- Tabela Settigns marcas
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `occasion` VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_sys_settigns.produto_model` ( -- Tabela Settigns modelos
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `model` VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_sys_settigns.produto_size` ( -- Tabela Settigns modelos
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `size` VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;