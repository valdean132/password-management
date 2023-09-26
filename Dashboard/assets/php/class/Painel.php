<?php

    class Painel{

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

        // Pegando Ip
        public static function getClientIpGeo(){
            $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';
            

            $api_url = "https://ipinfo.io/{$ipaddress}/country";

            $response = file_get_contents($api_url);

            if(!$response)
                $country = trim($response);
            else
                $country = 'Não Encontrado';

            return [
                'ip' => $ipaddress,
                'country' => $country
            ];;
        }

        // Separando url
        public static function separaUrl($url){
            if($url == INCLUDE_PATH){
                return 'login';
            }else{
                $separate = explode(INCLUDE_PATH, $url)[1];
    
                if($separate == 'login' || $separate == 'register')
                    return 'login';
                else{
                    $separa2 = explode("?page=", $separate);
                    $end = $separa2[count($separa2)-1];
    
                    return "login?page=$end";
                }
    
            }
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
            $sql = MySql::conectar(DATABASE)->prepare("$acao DATABASE $newDB");
            $sql->execute();
        }

        public static function addTablesNew($database, $newTbale){
            $single_table = explode(';', $newTbale);

            foreach($single_table as $key => $value){
                $sql = MySql::conectar($database)->prepare("$value");
                $sql->execute();
            }
        }

        // Inserindo depoimento no banco de dados
        public static function insert($database, $arr){
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
                $sql = MySql::conectar($database)->prepare($query);
                $sql->execute($parametros);

            }

            return $certo;
        }

        // Atualizando dinamicamente no banco de dados
        public static function update($database, $arr, $condition = false, $single = false){
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
                    $sql = MySql::conectar($database)->prepare("$query WHERE `$condition`=?");
                    $sql->execute($parametros);
                }else{
                    $sql = MySql::conectar($database)->prepare($query);
                    $sql->execute($parametros);
                }
            }
        }

        // Verificar se usuário já existe
        public static function userExists($database, $value, $table, $column, $idUser = NULL){
            if($idUser == NULL){
                $sql = MySql::conectar($database)->prepare("SELECT `id` FROM `$table` WHERE `$column` = ?");
                $sql->execute(array($value));
            }else{
                $sql = MySql::conectar($database)->prepare("SELECT `id` FROM `$table` WHERE `$column` = ? AND id_user != ?");
                $sql->execute(array($value, $idUser));
            }
            if($sql->rowCount() >= 1)
                return true;
            else
                return false;
        }

        // Verificando se Existe a chave especificada
        public static function verificKey($table, $key){
            $pdo = new MySql;
            $sql = $pdo->conectar(DATABASE)->prepare("SELECT `id_user`, `request` FROM `$table` WHERE `key` = ?");
            $sql->execute(array($key));

            return $sql->fetch();
        }

        // Puxando do banco de dados
        public static function selectAll($database, $tabela, $order, $start = null, $end = null){
            if($start == null && $end == null){
                $sql = MySql::conectar($database)->prepare("SELECT nome FROM `$tabela` ORDER BY $order ");
            }else{
                $sql = MySql::conectar($database)->prepare("SELECT * FROM `$tabela` ORDER BY $order LIMIT $start, $end");
            }
            echo $order;
            $sql->execute();

            return $sql->fetchAll();
        }


        // Puxando do banco de dados
        public static function selectAllSettings($database, $info, $table, $order, $where = ''){
            $sql = MySql::conectar($database)->prepare("SELECT $info FROM `$table` $where ORDER BY `$order` ASC ");
            
            $sql->execute();

            return $sql->fetchAll();
        }

        // Deletar cadastros
        public static function deletar($database, $tabela, $column = false, $value = false){
            if($value == false){
                $sql = MySql::conectar($database)->prepare("DELETE FROM `$tabela`");
            }else{
                $sql = MySql::conectar($database)->prepare("DELETE FROM `$tabela` WHERE `$column` = '$value'");
            }
            $sql->execute();
        }

        // Teste de classe
        public static function teste(){
            return 'Você chegou aqui!';
        }
    }

?>