<?php

    include('../../config.php');  

    if(isset($_POST['value'])){
        if(!Painel::deletar($_POST['table'], $_POST['column'], $_POST['value'])){
            $result = [
                'type' => 'success',
                'msg' => 'Item deletado com Sucesso.',
                'span' => ''
            ];
        }else{
            $result = [
                'type' => 'error',
                'msg' => 'Erro ao Deletar Item. ',
                'span' => 'Tente novamente, se persistir contate o suporte.'
            ];
        }
    }

    echo json_encode($result);

?>