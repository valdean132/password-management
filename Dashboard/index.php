<?php
    include('./config.php');

    if(Diretorios::logado() === false){
        include('registration-and-login.php');
    }else{
        include('main.php');
    }
?>