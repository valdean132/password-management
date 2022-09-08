<?php
    include('../../config.php'); 

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

    if(isset($_POST['cadastrar-not'])){
        $newPassword = Painel::geraSenha(12, true, true, true);
        $newId_User = uniqid();
        $database = "pwm_user_$newId_User";

        // Verificando se há campos vázios
        if($_POST['nome'] == '' || $_POST['email'] == '' || $_POST['contato'] == ''){
            $result = [
                'type' => 'error',
                'msg' => 'Campos vazios não são permitidos.',
                'span' => ''
            ];
            echo json_encode($result);
            exit;
        }else{ // Se não existir campos vázios
            // Verificando se usuário já existe.
            if(Painel::userExists($_POST['email'], 'tb_sys_admin.user', 'email', $newId_User)){
                $result = [
                    'type' => 'error',
                    'msg' => 'Erro ao Cadastrar usuário. ',
                    'span' => 'E-mail escolhido já se encontra cadastrado.'
                ];
                echo json_encode($result);
                exit;
            }else{ // Se não houver o e-mail do usuário cadastrado
                // Criando Banco de dados para o usuário
                if(!Painel::createAndDropDB($database, 'create')){
                    // Adcionando os campos restantes para cadastro de usuário e formatando campos para ir de forma correta
                    $_POST['nome'] = ucwords(strtolower($_POST['nome']));
                    $_POST['email'] = strtolower($_POST['email']);
                    $_POST['password'] = md5($newPassword);
                    $_POST['id_user'] = $newId_User;
                    $_POST['status'] = 1;
                    $_POST['database'] = $database;
                    $_POST['nome_tabela-not'] = 'tb_sys_admin.user';


                    if(Painel::insert($_POST)){
                        echo json_encode('Usuário cadastrado com sucesso');
                        exit;
                    }else{
                        $resultConf = [
                            'type' => 'error',
                            'msg' => 'arece que ocorreu um erro inesperado. ',
                            'span' => 'Tente novamente, se persistir clique nessa mensagem...'
                        ];
                        echo json_encode($result);
                        exit;
                    }
                    // if(!Painel::createAndDropDB("pwm_user_$database", 'drop')){
                    //     $result = "Criamos e deletamos esse banco de dados: pwm_user_$database";
                    //     echo json_encode($result);
                    //     exit;
                    // }
                }else{ // Caso Aja erro ao criar banco de dados
                    $result = [
                        'type' => 'error',
                        'msg' => 'Parece que ocorreu um erro inesperado. ',
                        'span' => 'Tente novamente, se persistir clique nessa mensagem...'
                    ];
                    echo json_encode($result);
                    exit;
                }
            }
        }


        echo json_encode($_POST);
    }


?>