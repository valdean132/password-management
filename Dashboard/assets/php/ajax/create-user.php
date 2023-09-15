<?php
    # Primeiro Passo: Verificar se Dados existem
    /* 
        Se Sim: Matar o script e enviar uma mensagem informando que usuário já está cadastrado

        Se Não: Prossequir com o proximo passo.
    */
    # Segundo Passo: Cadastrar usuário no banco de dados com o novo id gerado
    /* 
        Cadastrar novo usuário, se ocorrer tudo bem, prossiga com o proximo passo, se não mate o script e informe que hove um erro inesperado.
    */
    # Terceiro Passo: Criar novo banco de cados que deverá ser lincado ao novo usuário
    /* 
        Essa criação de banco de dados deve ser padrão para todos os usuários, onde já teve ter todas as tabelas prê difinidas.
        Se essa criação ocorre com sucesso, prossiga para o proximo passo, se não, mate o script, apague o registro do usuário que foi cadastrado antes e informar que houve um erro inesperado
    */
    # Quarto Passo: Enviar mesagem para o e-mail do usuário
    /* 
        Deposi de tudo Okay, envie uma mensagem para o e-mail do usuário com a senha e login do mesmo.
        Se o houver um erro de envio mate o script, delete o banco de dados que foi criado, delete o registro do usuário e informe que houve um erro inesperado. Caso contrario continue.
        Se a reposta do envio de e-mail informar que o e-mail não foi encontrato mate o script, delete o banco de dados que foi criado, delete o registro do usuário e informe ao usuário que o e-mail não existe ou não foi encontrado.
    */
    # Quinto Passo: Se tudo ocorrer como esperado faça isso
    /* 
        Se conseguiu chegar até aqui, então quer dizer que foi tudo criadoe corretamente, após isso, informe ao usuário que tudo ocorreu bem e peça para acessar o e-mail do mesmo para verificar as informações enviadas a ele. Depois disso, mate o script e espere por uma nova ação no mesmo.
    */

    $key_request = Painel::verificKey('tb_pwm_admin.keys', KEY_MAIN);

    if(count($key_request) >= 1){
        $updateRequest = [
            'id_user-not' => $key_request['id_user'],
            'request' => $key_request['request']+1,
            'nome_tabela-not' => 'tb_pwm_admin.keys'
        ];
        Painel::update(DATABASE, $updateRequest, 'id_user');

        if(isset($_POST['cadastrar-not'])){
            $newPassword = Painel::geraSenha(12, true, true, true);
            $newId_User = uniqid();
            $database = "pwm_user_$newId_User";
    
            // Verificando se há campos vázios
            if($_POST['nome'] == '' || $_POST['email'] == '' || $_POST['contato'] == ''){
                $result = [
                    'type' => 'error',
                    'msg' => 'Campos vazios não são permitidos.',
                    'span' => '',
                    'suport' => false
                ];
                echo json_encode($result);
                die();
            }else{ // Se não existir campos vázios
                // Verificando se usuário já existe.
                if(Painel::userExists(DATABASE, $_POST['email'], 'tb_pwm_admin.user', 'email', $newId_User)){
                    $result = [
                        'type' => 'error',
                        'msg' => 'E-mail escolhido já se encontra cadastrado. ',
                        'span' => 'Informe outro e tente novamente...',
                        'suport' => false,
                        'inputError' => [
                            'name' => 'email',
                            'msgInput' => 'E-mail já cadastrado, informe outro.'
                        ]
                    ];
                    echo json_encode($result);
                    die();
                }else{ // Se não houver o e-mail do usuário cadastrado
                    // Criando Banco de dados para o usuário
                    if(!Painel::createAndDropDB($database, 'create')){
                        Painel::addTablesNew($database, TABLES_USER);
                        // Adcionando os campos restantes para cadastro de usuário e formatando campos para ir de forma correta
                        $_POST['nome'] = ucwords(strtolower($_POST['nome']));
                        $_POST['email'] = strtolower($_POST['email']);
                        $_POST['password'] = md5($newPassword);
                        $_POST['id_user'] = $newId_User;
                        $_POST['status'] = 1;
                        $_POST['create'] = date('Y-m-d H:i:s');
                        $_POST['database'] = $database;
                        $_POST['last_acess'] = date('Y-m-d H:i:s');
                        $_POST['nome_tabela-not'] = 'tb_pwm_admin.user';
    
                        if(Painel::insert(DATABASE, $_POST)){
                            $saveKey = [
                                'id_user' => $_POST['id_user'],
                                'key' => $_POST['key'],
                                'request' => 0,
                                'nome_tabela-not' => 'tb_pwm_admin.keys',

                            ];
                            if(Painel::insert(DATABASE, $saveKey)){
                                $values = [ // Criando Array para enviar para o Corpo de da mensagem
                                    'nome' => $_POST['nome'],
                                    'email' => 'seu email cadastrado', // Verificar isso depois
                                    'password' => $newPassword,
                                ];
        
                                $info = array( // Array com Assunto e corpo do e-mail retornado
                                    'assunto' => 'Confirmação de Cadastro...',
                                    'corpo' => BaseHtml::emailConfiRegister($values)
                                );
                                $mail = new Email( // Chamando função para envio de e-mail
                                    'smtp.titan.email',
                                    'desenvolvedor@valdeansouza.com',
                                    'dev2022',
                                    'Sac PWM'
                                );
        
                                $mail->addAdress($_POST['email'], explode(' ', $_POST['nome'])[0]); // Pegando nome do usuário e e-mail para fazer envio
                                $mail->formatarEmail($info); // Formatando corpo para envio de formulário
                        
                                if($mail->enviarEmail()){ // Fazendo envio de e-mail e verificando se e-mail existe
                                    $resultConf = [
                                        'type' => 'success',
                                        'msg' => 'Cadastro realizado com sucesso... ',
                                        'span' => 'Acesse sua caixa de e-mail para confirmar o cadastro.',
                                        'suport' => false
                                    ];
                                    echo json_encode($resultConf);
                                    die();
                                }else{ // Se o E-mail não existir joga essa mensagem.
                                    $resultConf = [
                                        'type' => 'error',
                                        'msg' => 'E-mail informado é inválido! ',
                                        'span' => 'Informe um e-mail valido e tente novamente...',
                                        'suport' => false,
                                        'inputError' => [
                                            'name' => 'email',
                                            'msgInput' => 'Informe um E-mail valido.'
                                        ]
                                    ];
                                    Painel::deletar(DATABASE, $_POST['nome_tabela-not'], 'id_user', $_POST['id_user']);
                                    Painel::deletar(DATABASE, $saveKey['nome_tabela-not'], 'id_user', $saveKey['id_user']);
                                    Painel::createAndDropDB($database, 'drop');
                                    echo json_encode($resultConf);
                                    die();
                                }

                            }else{
                                $resultConf = [
                                    'type' => 'error',
                                    'msg' => 'Parece que ocorreu um erro inesperado. ',
                                    'span' => 'Tente novamente, se persistir clique nessa mensagem...',
                                    'suport' => true
                                ];

                                Painel::deletar($_POST['nome_tabela-not'], 'id_user', $_POST['id_user']);
                                Painel::createAndDropDB($database, 'drop');
                                echo json_encode($result);
                                die();
                            }

                        }else{
                            $resultConf = [
                                'type' => 'error',
                                'msg' => 'Parece que ocorreu um erro inesperado. ',
                                'span' => 'Tente novamente, se persistir clique nessa mensagem...',
                                'suport' => true
                            ];
                            Painel::createAndDropDB($database, 'drop');
                            echo json_encode($result);
                            die();
                        }
                    }else{ // Caso Aja erro ao criar banco de dados
                        $result = [
                            'type' => 'error',
                            'msg' => 'Parece que ocorreu um erro inesperado. ',
                            'span' => 'Tente novamente, se persistir clique nessa mensagem...',
                            'suport' => true
                        ];
                        echo json_encode($result);
                        die();
                    }
                }
            }
            echo json_encode($_POST);
        }
    }else{
        echo json_encode('error');
        die();
    }



?>