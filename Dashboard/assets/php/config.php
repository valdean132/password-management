<?php

    session_start();
    date_default_timezone_set('America/Manaus');

    $autoload = function($class){
        if($class == 'Email'){
            require_once 'vendor/autoload.php';
        }
        include('./class/'.$class.'.php'); 
    };

    spl_autoload_register($autoload);

    // Definindo Diretorios
    define('INCLUDE_PATH', 'http://'.$_SERVER['HTTP_HOST'].'/'); // Diretorio Principal
    // define('INCLUDE_PATH_ATUAL', 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); // Diretorio atual
    define('BASE_DIR', __DIR__); // Base para as acesso das pastas
    define('KEY_MAIN', 'd9485e42-52a7-bbfe-b910-42942b5ebc77');
    define('TABLES_USER', 'CREATE TABLE `tb_pwm_user.passwords` (`id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,`uniq_id` VARCHAR(13) NOT NULL,`title` VARCHAR(100) NOT NULL,`site` VARCHAR(150),`access_uniq` TEXT NOT NULL,`access_token` VARCHAR(4) NOT NULL,`create` DATETIME NOT NULL,`date_alter` DATETIME NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1; CREATE TABLE `tb_pwm_user.access`(`id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,`access_uniq` VARCHAR(13) NOT NULL,`login` VARCHAR(150) NOT NULL,`pssword` VARCHAR(150) NOT NULL,`create` DATETIME NOT NULL,`date_alter` DATETIME NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1; CREATE TABLE `tb_pwm_user.dump_access`(`id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,`access_uniq` VARCHAR(13) NOT NULL,`login` VARCHAR(150) NOT NULL,`pssword` VARCHAR(150) NOT NULL,`create` DATETIME NOT NULL,`date_alter` DATETIME NOT NULL,`date_dump` DATETIME NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1; CREATE TABLE `tb_pwm_user.dump_main` (`id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,`uniq_id` VARCHAR(13) NOT NULL,`title` VARCHAR(100) NOT NULL,`site` VARCHAR(150) NOT NULL,`access_uniq` TEXT NOT NULL,`access_token` VARCHAR(4) NOT NULL,`create` DATETIME NOT NULL,`date_alter` DATETIME NOT NULL,`date_dump` DATETIME NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1');
    
    // Conexão com o banco de dados
    define('HOST', 'localhost');
    define('USER', 'root');
    define('USERNAME','');
    define('DATABASE', 'pwm_main');
?>