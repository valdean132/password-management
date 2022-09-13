<?php
    include('../../config.php');

    // echo json_encode($_POST);

    if(isset($_POST['acao'])){
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
            exit;
        }else{
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_sys_admin.user` WHERE email = ?");
            $sql->execute(array($email));
            if($sql->rowCount() == 1){
                $info = $sql->fetch();

                if($password === $info['password']){
                    if($info['status'] == 1){
                        $_SESSION['login'] = true;
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        $_SESSION['id_user'] = $info['id_user'];
                        $_SESSION['nome'] = $info['nome'];
                        $_SESSION['contato'] = $info['contato'];
                        $_SESSION['img'] = $info['photo_user'];
                        $_SESSION['status'] = $info['status'];
                        $_SESSION['nome_tabela'] = 'tb_sys_admin.user';
                        $_SESSION['database'] = $info['database'];
    
                        if($_POST['lembrarConexao'] == 'on'){
                            setcookie('lembrarConexao', true, time()+(12), '/');
                            setcookie('email', $email, time()+(12), '/');
                            setcookie('password', $password, time()+(12), '/');
                        }
                        
                        $result = [
                            'type' => 'success',
                            'msg' => 'Prosseguindo para o Painel  ',
                            'span' => 'Aguarde...',
                            'suport' => false
                        ];
                        echo json_encode($result);
                        die();
                    }else{
                        $result = [
                            'type' => 'error',
                            'msg' => 'Sua Conta Está Desativada!!! ',
                            'span' => 'Clique aqui e contate um Administrador...',
                            'suport' => true
                        ];
                        echo json_encode($result);
                        exit;
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
                    echo json_encode($result);
                    exit;
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
                echo json_encode($result);
                exit;
            }
        }
    }

?>