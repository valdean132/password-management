-- Banco de dados Sistema Solalux

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Criação do banco de dados
CREATE DATABASE pwm_main;

USE pwm_main;


--
-- Criação de tabelas
--

CREATE TABLE `tb_pwm_admin.user` ( -- Tabela de Usuários
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_user` VARCHAR(13) NOT NULL,
    `nome` VARCHAR(100) NOT NULL,
    `password` VARCHAR(33) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `contato` VARCHAR(15) NOT NULL,
    `photo_user` VARCHAR(30) NOT NULL,
    `status` VARCHAR(10) NOT NULL,
    `key` VARCHAR(36) NOT NULL,
    `create` DATETIME NOT NULL,
    `database` VARCHAR(50) NOT NULL,
    `last_access` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_pwm_admin.keys` ( -- Tabela para quardar as Chaves de acesso e sua quantidade de requisições
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_user` VARCHAR(13) NOT NULL,
    `key` VARCHAR(36) NOT NULL,
    `request` INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Settings

/* Criação de banco de dados dinâmicos */

-- CREATE DATABASE mfc_user_aqui-vai-o-id-único
--
-- Criação de tabela
--

CREATE TABLE `tb_pwm_user.passwords` (
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `uniq_id` VARCHAR(13) NOT NULL,
    `title` VARCHAR(100) NOT NULL,
    `site` VARCHAR(150),
    `access_uniq` TEXT NOT NULL,
    `access_token` VARCHAR(4) NOT NULL,
    `create` DATETIME NOT NULL,
    `date_alter` DATETIME NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `tb_pwm_user.access`(
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `access_uniq` VARCHAR(13) NOT NULL,
    `login` VARCHAR(150) NOT NULL,
    `password` VARCHAR(150) NOT NULL,
    `create` DATETIME NOT NULL,
    `date_alter` DATETIME NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `tb_pwm_user.dump_access`(
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `access_uniq` VARCHAR(13) NOT NULL,
    `login` VARCHAR(150) NOT NULL,
    `password` VARCHAR(150) NOT NULL,
    `create` DATETIME NOT NULL,
    `date_alter` DATETIME NOT NULL,
    `date_dump` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `tb_pwm_user.dump_main` (
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `uniq_id` VARCHAR(13) NOT NULL,
    `title` VARCHAR(100) NOT NULL,
    `site` VARCHAR(150) NOT NULL,
    `access_uniq` TEXT NOT NULL,
    `access_token` VARCHAR(4) NOT NULL,
    `create` DATETIME NOT NULL,
    `date_alter` DATETIME NOT NULL,
    `date_dump` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `tb_pwm_user.recent_activities` (
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `uniq_id` VARCHAR(13) NOT NULL,
    `platform` VARCHAR(20) NOT NULL,
    `last_login` DATETIME NOT NULL,
    `local` VARCHAR(20) NOT NULL,
    `ip` VARCHAR(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `tb_pwm_user.settings` (
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `color` VARCHAR(7) NOT NULL,
    `theme` VARCHAR(5) NOT NULL,
    `views_table` VARCHAR(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `tb_pwm_user.settings` VALUES ( NULL, '#3CB35A', 'dark', 'list' );