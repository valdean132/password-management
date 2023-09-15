<?php

    class MySql{
        private static $pdo;

        public static function conectar($database){
            
            self::$pdo = null;

            if(self::$pdo == null){
                try{
                    self::$pdo = new PDO('mysql:host='.HOST.';dbname='.$database,USER,USERNAME,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                }catch(Exception $e){
                    // echo '<h2>Erro na conexão com o Banco de Dados!!!</h2>';
                    echo $e;
                }
            }

            return self::$pdo;
        }
    }

?>