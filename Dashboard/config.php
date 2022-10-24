<?php

    session_start();
    date_default_timezone_set('America/Manaus');

    $autoload = function($class){
        if($class == 'Email'){
            require_once('assets/class/PHPMailer/PHPMailerAutoload.php');
        }
        include('assets/class/'.$class.'.php'); 
    };

    spl_autoload_register($autoload);

    // Definindo Diretorios
    define('INCLUDE_PATH', 'http://'.$_SERVER['HTTP_HOST'].'/'); // Diretorio Principal
    define('INCLUDE_PATH_D', INCLUDE_PATH.'assets/'); // Diretorio de arquivos
    define('INCLUDE_PATH_ATUAL', 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); // Diretorio atual
    define('BASE_DIR', __DIR__); // Base para as acesso das pastas

    

    // Conexão com o banco de dados
    define('HOST', 'localhost');
    define('USER', 'spark');
    define('USERNAME','9!!mQ33L');
    define('DATABASE', 'password_management_db_main');


    
    $sql = MySql::conectar()->prepare("SELECT nome FROM `tb_sys_admin.user`");
    
    $sql->execute();
    
    foreach($sql->fetchAll() as $row) {
        echo "<li>" . $row['nome'] . "</li>";
    }
    
    // echo Painel::teste();
    
    // try {
    //     $db = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, USERNAME);
    //     echo "<h2>TODO</h2><ol>";
    //     echo "</ol>";
    // } catch (PDOException $e) {
    //     print "Error!: " . $e . "<br/>";
    //     // die();
    // }
?>