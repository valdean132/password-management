<?php
    include('../../config.php');

    if(isset($_POST['acao-not'])){

        foreach($_POST as $key => $value){
            if(substr($key, -4, 4) == '-not')
                continue;
            
            $name_new[] = explode('-', $key)[0];
        }

        $verificMsg = false;

        for($i = 0; $i <= count($name_new); $i++){
            foreach($_POST as $key => $value){
                if(substr($key, -4, 4) == '-not')
                    continue;
                
                $newPost[$name_new[0]] = ucwords(strtolower($value));
                $newPost['nome_tabela-not'] = $_POST['nome_tabela-not'];
    
            
                if(!Painel::userExists($value, $_POST['nome_tabela-not'], $name_new[0])){
                    if(Painel::insert($newPost)){
                        $resultConf = [
                            'type' => 'success',
                            'msg' => 'Dados cadastrados com sucesso.',
                            'span' => ''
                        ];
                    }
                    else{
                        $resultConf = [
                            'type' => 'error',
                            'msg' => 'Erro ao cadastrar os dados ',
                            'span' => 'Tenten novamente mais tarde... Se continuar contate o suport.'
                        ];
                    }
                    
                    $verificMsg = true;
                    
                }else{
                    $resultNoConf = [
                        'type' => 'error',
                        'msg' => 'Erro ao cadastrar. ',
                        'span' => 'Item já existe.'
                    ];
                }
            }
        }
        
        
    }

    echo json_encode($verificMsg ? $resultConf : $resultNoConf);


?>