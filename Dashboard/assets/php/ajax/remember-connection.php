<?php

    if(isset($_COOKIE['lembrarConexao'])){
        $email = $_COOKIE['email'];
        $password = $_COOKIE['password'];
        // $ipGeo = Painel::getClientIpGeo(); // Ativar essa função quando estiver online
        $ipGeo = [
            'ip' => '192.168.15.1',
            'country' => 'Brasil'
        ];

        $sql = MySql::conectar(DATABASE)->prepare("SELECT * FROM `tb_pwm_admin.user` WHERE email = ? AND password = ?");
        $sql->execute(array($email, $password));

        if($sql->rowCount() == 1){
            $info = $sql->fetch();

            if($info['status'] == 1){

                $key_request = Painel::verificKey('tb_pwm_admin.keys', $info['key']);

                if(count($key_request) < 1){
                    $result = [
                        'type' => 'error',
                        'msg' => 'Sua Conta Está Desativada!!! ',
                        'span' => 'Clique em Suport e contate o Administrador...',
                        'suport' => true,
                        'msgAction' => 'Suport'
                    ];
                    die(json_encode($result));
                }


                $updateRequest = [
                    'id_user-not' => $key_request['id_user'],
                    'request' => $key_request['request']+1,
                    'nome_tabela-not' => 'tb_pwm_admin.keys'
                ];
                Painel::update(DATABASE, $updateRequest, 'id_user');

                $update = [
                    'last_access' => date('Y-m-d H:i:s'),
                    'id_user-not' => $info['id_user'],
                    'nome_tabela-not' => 'tb_pwm_admin.user'
                ];
                $register_activities = [
                    'uniq_id' => uniqid(),
                    'platform' => $_COOKIE['platform'],
                    'last_login' => $update['last_access'],
                    'local' => $ipGeo['country'],
                    'ip' => $ipGeo['ip'],
                    'nome_tabela-not' => 'tb_pwm_user.recent_activities'
                ];
                if(!Painel::update(DATABASE, $update, 'id_user') && Painel::insert($info['database'], $register_activities)){
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
                    $_SESSION['last_access'] = date('Y-m-d H:i:s');

                    setcookie('lembrarConexao', true, time()+(12), '/');
                    setcookie('email', $email, time()+(12), '/');
                    setcookie('password', $password, time()+(12), '/');
                    setcookie('platform', $_COOKIE['platform'], time()+(12), '/');

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
                        'span' => 'Tente novamente, se persistir clique em Suport...',
                        'suport' => true,
                        'msgAction' => 'Suport'
                    ];
                    die(json_encode($result));
                }
            }else{
                echo json_encode([
                    'type' => 'error',
                    'login' => false,
                    'msg' => 'Sua Conta Está Desativada!!! ',
                    'span' => 'Clique em Suport e contate o Administrador...',
                    'suport' => true,
                    'msgAction' => 'Suport'
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