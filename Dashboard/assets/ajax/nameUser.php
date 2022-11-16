<?php

    include('../../config.php');  

    if(isset($_POST['name'])){
        $result = [
            'nome' => $_SESSION['nome'],
            'email' => $_SESSION['email'],
            'contato' => $_SESSION['contato'],
            'nome_tabela' => $_SESSION['nome_tabela'],
            'id_user' => $_SESSION['id_user'],
        ];
    }

    echo json_encode($result);

?>