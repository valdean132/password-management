<?php

    if($_POST['loggout'] == 'loggout'){
        $url = Painel::separaUrl($_POST['urlAtual']);

        setcookie('lembrarConexao', 'true', time()-1, '/');
        session_destroy();

        echo json_encode([
            'login' => false,
            'url' => $url
        ]);
        die();
    }


?>