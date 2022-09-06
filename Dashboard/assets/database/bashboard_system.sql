-- Banco de dados Sistema Solalux

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Criação do banco de dados
CREATE DATABASE password_management_db_main;

USE password_management_db_main;


--
-- Criação de tabelas
--

CREATE TABLE `tb_sys_admin.user` ( -- Tabela Usuários Funcionarios
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_user` VARCHAR(13) NOT NULL,
    `nome` VARCHAR(100) NOT NULL,
    `password` VARCHAR(33) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `contato` VARCHAR(15) NOT NULL,
    `photo_user` VARCHAR(30),
    `status` VARCHAR(10) NOT NULL,
    `database` VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Settings