<?php

    if(isset($_COOKIE['lembrarConexao'])){
        $email = $_COOKIE['email'];
        $password = $_COOKIE['password'];

        $sql = MySql::conectar(DATABASE)->prepare("SELECT * FROM `tb_pwm_admin.user` WHERE email = ? AND password = ?");
        $sql->execute(array($email, $password));

        if($sql->rowCount() == 1){
            $info = $sql->fetch();

            if($info['status'] == 1){
                $update = [
                    'last_acess' => date('Y-m-d H:i:s'),
                    'id_user-not' => $info['id_user'],
                    'nome_tabela-not' => 'tb_pwm_admin.user'
                ];
                if(!Painel::update(DATABASE, $update, 'id_user')){
                    $_SESSION['login'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['id_user'] = $info['id_user'];
                    $_SESSION['nome'] = $info['nome'];
                    $_SESSION['contato'] = $info['contato'];
                    $_SESSION['photo_user'] = $info['photo_user'];
                    $_SESSION['status'] = $info['status'];
                    $_SESSION['nome_tabela'] = 'tb_pwm_admin.user';
                    $_SESSION['key'] = $info['key'];
                    $_SESSION['database'] = $info['database'];
                    $_SESSION['last_acess'] = date('Y-m-d H:i:s');

                    setcookie('lembrarConexao', true, time()+(12), '/');
                    setcookie('email', $email, time()+(12), '/');
                    setcookie('password', $password, time()+(12), '/');

                    $result = [
                        'type' => 'success',
                        'login' => true,
                        'msg' => 'Bem vindo a PWM!!!',
                        'suport' => false,
                    ];
                    die(json_encode($result));

                }else{
                    $result = [
                        'type' => 'error',
                        'login' => false,
                        'msg' => 'Parece que ocorreu um erro inesperado. ',
                        'span' => 'Tente novamente, se persistir clique nessa mensagem...',
                        'suport' => true
                    ];
                    die(json_encode($result));
                }
            }else{
                echo json_encode([
                    'type' => 'error',
                    'login' => false,
                    'msg' => 'Sua Conta Está Desativada!!! ',
                    'span' => 'Clique aqui e contate um Administrador...',
                    'suport' => true
                ]);
                die();
            }
        }
    }else{
        $url = Painel::separaUrl($_POST['urlAtual']);

        echo json_encode([
            'login' => false,
            'url' => $url
        ]);
        die();
    }