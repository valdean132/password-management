<?php

    if(isset($_POST['login-not'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        if($email === '' && $password === ''){
            $resultConf = [
                'type' => 'error',
                'msg' => 'Campos vazios não são permitidos.',
                'span' => '',
                'suport' => false
            ];
            echo json_encode($resultConf);
        }else{
            $sql = MySql::conectar(DATABASE)->prepare("SELECT * FROM `tb_pwm_admin.user` WHERE email = ?");
            $sql->execute(array($email));
            if($sql->rowCount() == 1){
                $info = $sql->fetch();

                if($password === $info['password']){
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
        
                            if($_POST['lembrarConexao'] == 'on'){
                                setcookie('lembrarConexao', true, time()+(12), '/');
                                setcookie('email', $email, time()+(12), '/');
                                setcookie('password', $password, time()+(12), '/');
                            }
    
                            $result = [
                                'type' => 'success',
                                'msg' => 'Bem vindo a PWM!!!',
                                'suport' => false,
                                'login_subconta' => true
                            ];
                            die(json_encode($result));

                        }else{
                            $result = [
                                'type' => 'error',
                                'msg' => 'Parece que ocorreu um erro inesperado. ',
                                'span' => 'Tente novamente, se persistir clique nessa mensagem...',
                                'suport' => true
                            ];
                            die(json_encode($result));
                        }
                    }else{
                        $result = [
                            'type' => 'error',
                            'msg' => 'Sua Conta Está Desativada!!! ',
                            'span' => 'Clique aqui e contate um Administrador...',
                            'suport' => true
                        ];
                        die(json_encode($result));
                    }
                }else{
                    $result = [
                        'type' => 'error',
                        'msg' => 'Senha informada está incorreta. ',
                        'span' => '',
                        'suport' => false,
                        'inputError' => [
                            'name' => 'password',
                            'msgInput' => 'Verifique sua senha e tente novamente.'
                        ]
                    ];
                    die(json_encode($result));
                }

                
            }else{
                $result = [
                    'type' => 'error',
                    'msg' => 'E-mail informado não está cadastrado. ',
                    'span' => 'Faça um Cadastro para prosseguir...',
                    'suport' => false,
                    'inputError' => [
                        'name' => 'email',
                        'msgInput' => 'E-mail não encontrado...'
                    ]
                ];
                die(json_encode($result));
            }
        }
    }

?>