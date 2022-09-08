<?php

    class Painel{

        // Mensagem de alerta
        public static function boxMsg($type, $msg, $span = null){
            return '<div class="box-alert '.$type.'"><p>'.$msg.' <span>'.$span.'</span></p></div>';
        }

        // Gerando Senha Aleatória
        public static function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false){
            $lmin = 'abcdefghijklmnopqrstuvwxyz';
            $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $num = '1234567890';
            $simb = '!@#$%*()_+^&{}}:;?.';
            $retorno = '';
            $caracteres = '';
    
            $caracteres .= $lmin;
            if ($maiusculas) $caracteres .= $lmai;
            if ($numeros) $caracteres .= $num;
            if ($simbolos) $caracteres .= $simb;
    
            $len = strlen($caracteres);
            for ($n = 1; $n <= $tamanho; $n++) {
                $rand = mt_rand(1, $len);
                $retorno .= $caracteres[$rand-1];
            }
            return $retorno;
        }

        // Salvando Arquivos
        public static function uploadFile($file){
            $formatoArquivo = explode('.',$file['name']);
            $fileNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];

            if($file['type'] == 'image/jpeg' || 
                $file['type'] == 'image/jpg' || 
                $file['type'] == 'image/png'){ // Caso seja imagem
                
                if(move_uploaded_file($file['tmp_name'], BASE_DIR.'/assets/uploads/image/'.$fileNome)){
                    return $fileNome;
                }else{
                    return false;
                }
            }else{ // Caso seja documentos
                if(move_uploaded_file($file['tmp_name'], BASE_DIR.'/assets/uploads/document/'.$fileNome)){
                    return $fileNome;
                }else{
                    return false;
                }
            }
        }

        // Deletar Arquivos
        public static function deleteFile($file, $type){
            if($type == 'image/jpeg' || 
                $type == 'image/jpg' || 
                $type == 'image/png'){ // Caso seja uma imagem
                @unlink(BASE_DIR.'/assets/uploads/image/'.$file);
            }else{ // Caso seja documentos
                @unlink(BASE_DIR.'/assets/uploads/document/'.$file);
            }
        }

        // Criando banco de dados de forma dinamica
        public static function createAndDropDB($newDB, $acao){ // $newDB: Nome do banco de dados <=> $acao: Ação a ser atribuida => "CREATE" or "DROP"
            $sql = MySql::conectar()->prepare("$acao DATABASE $newDB");
            $sql->execute();
        }

        // Inserindo depoimento no banco de dados
        public static function insert($arr){
            $certo = true;
            $first = false;
            $nome_tabela = $arr['nome_tabela-not'];
            $query = "INSERT INTO `$nome_tabela` (";
            
            foreach($arr as $key => $value){
                $nome = $key;

                if(substr($nome, -4, 4) == '-not' || substr($nome, -3, 3) == '-no')
                    continue;

                if($first == false){
                    $first = true;
                    $query.="`$nome`";
                }else{
                    $query.=",`$nome`";
                }
                
            }
            $first = false;
            $query.= ") VALUES (";

            foreach($arr as $key => $value){
                $nome = $key;

                if(substr($nome, -4, 4) == '-not' || substr($nome, -3, 3) == '-no')
                    continue;

                if($first == false){
                    $first = true;
                    $query.="?";
                }else{
                    $query.=",?";
                }
                $parametros[] = $value;
                
            }
            $query.=")";

            if($certo == true){
                $sql = MySql::conectar()->prepare($query);
                $sql->execute($parametros);

            }

            return $certo;
        }

        // Atualizando dinamicamente no banco de dados
        public static function update($arr, $condition = false, $single = false){
            $certo = true;
            $first = false;
            $nome_tabela = $arr['nome_tabela-not'];
            $query = "UPDATE `$nome_tabela` SET ";

            foreach($arr as $key => $value){
                $nome = $key;

                if(substr($nome, -4, 4) == '-not' || substr($nome, -3, 3) == '-no' || $nome == $condition)
                    continue;

                if($first == false){
                    $first = true;
                    $query.="`$nome`=?";
                }else{
                    $query.=",`$nome`=?";
                }
                $parametros[] = $value;
                
            }

            if($certo == true){
                if($single == false){
                    $parametros[] = $arr[$condition.'-not'];
                    $sql = MySql::conectar()->prepare("$query WHERE `$condition`=?");
                    $sql->execute($parametros);
                }else{
                    $sql = MySql::conectar()->prepare($query);
                    $sql->execute($parametros);
                }
            }
        }

        // Verificar se usuário já existe
        public static function userExists($value, $table, $column, $idUser = NULL){
            if($idUser == NULL){
                $sql = MySql::conectar()->prepare("SELECT `id` FROM `$table` WHERE `$column` = ?");
                $sql->execute(array($value));
            }else{
                $sql = MySql::conectar()->prepare("SELECT `id` FROM `$table` WHERE `$column` = ? AND id_user != ?");
                $sql->execute(array($value, $idUser));
            }
            if($sql->rowCount() >= 1)
                return true;
            else
                return false;
        }

        // Puxando do banco de dados
        public static function selectAll($tabela, $order, $start = null, $end = null){
            if($start == null && $end == null)
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY $order ");
            else
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY $order LIMIT $start, $end");
            
            $sql->execute();

            return $sql->fetchAll();
        }

        // Puxando do banco de dados
        public static function selectAllSettings($info, $table, $order, $where = ''){
            $sql = MySql::conectar()->prepare("SELECT $info FROM `$table` $where ORDER BY `$order` ASC ");
            
            $sql->execute();

            return $sql->fetchAll();
        }

        // Deletar cadastros
        public static function deletar($tabela, $column = false, $value = false){
            if($value == false){
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
            }else{
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE `$column` = $value");
            }
            $sql->execute();
        }
    }

?>