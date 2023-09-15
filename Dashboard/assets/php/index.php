<?php

    include('./config.php');

    if(isset($_SESSION['login']) && $_SESSION['login']){
        if(isset($_POST['loggout'])){
            include('./ajax/loggout.php');
        }
        echo json_encode([
            'login' => true,
            'url' => $_POST['urlAtual']
        ]);
        // session_destroy();
        die();
    }else{ 
        if(isset($_POST['acao']) && $_POST['acao'] == 'verific-login')
            include('./ajax/remember-connection.php');
        
        if(isset($_POST['cadastre-user-not']))
            include('./ajax/create-user.php');
    
        if(isset($_POST['login-not']))
            include('./ajax/login-user.php');
    }
