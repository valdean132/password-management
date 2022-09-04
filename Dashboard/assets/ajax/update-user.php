<?php

    include('../../config.php');  
    if(isset($_POST['acao-not'])){
        $_POST['email'] = strtolower($_POST['email']);
        $_POST['nome'] = ucwords(strtolower($_POST['nome']));
        
        if($_SESSION['user'] == $_POST['login'] &&
            $_SESSION['nome'] == $_POST['nome'] &&
            $_SESSION['email'] == $_POST['email'] &&
            $_SESSION['contato'] == $_POST['contato']
        ){
            $result = [
                'type' => 'attention',
                'msg' => 'Nenhum dos dados foram alterados',
                'span' => ''
            ];
        }else{
            foreach($_POST as $key => $value){
                if(substr($key, -4, 4) == '-not')
                    continue;
                
                if(Painel::userExists($value, $_POST['nome_tabela-not'], $key, $_POST['id_user-not'])){
                    if($key == 'nome'){
                        $result = [
                            'type' => 'error',
                            'msg' => 'Erro ao Cadastrar usuário. ',
                            'span' => 'Nome escolhido já se encontra cadastrado.'
                        ];
                        echo json_encode($result);
                        exit;
                    }else if($key == 'login'){
                        $result = [
                            'type' => 'error',
                            'msg' => 'Erro ao Cadastrar usuário. ',
                            'span' => 'Login escolhido já se encontra cadastrado.'
                        ];
                        echo json_encode($result);
                        exit;
                    }else if($key == 'contato'){
                        $result = [
                            'type' => 'error',
                            'msg' => 'Erro ao Cadastrar usuário. ',
                            'span' => 'Contato escolhido já se encontra cadastrado.'
                        ];
                        echo json_encode($result);
                        exit;
                    }else if($key == 'email'){
                        $result = [
                            'type' => 'error',
                            'msg' => 'Erro ao Cadastrar usuário. ',
                            'span' => 'Email escolhido já se encontra cadastrado.'
                        ];
                        echo json_encode($result);
                        exit;
                    }else{
                        continue;
                    }
                }
            }
            if(!Painel::update($_POST, 'id_user')){
                $result = [
                    'type' => 'success',
                    'msg' => 'Dados atualizado com sucesso!',
                    'span' => ''
                ];
                $_SESSION['user'] = $_POST['login'];
                $_SESSION['nome'] = $_POST['nome'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['contato'] = $_POST['contato'];
            }else{
                $result = [
                    'type' => 'error',
                    'msg' => 'Erro ao atualizar os dados ',
                    'span' => 'Tenten novamente mais tarde... Se continuar contate o suport.'
                ];
            }
        }
    }

    echo json_encode($result);

?>