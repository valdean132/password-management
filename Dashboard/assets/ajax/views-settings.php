<?php

    include('../../config.php');  
    if(isset($_POST['settings'])){
        $separa = explode('_', $_POST['settings']);
        $valueColumn = end($separa);
        $result = [
            'result' => Painel::selectAllSettings("`$valueColumn`, id", $_POST['settings'], $valueColumn),
            'column' => $valueColumn,
            'table' => $_POST['settings']
        ];
    }

    echo json_encode($result);

?>