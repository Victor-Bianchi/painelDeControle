<?php 

    class MySQL {

        private static $pdo;
        public static function connect() {
            try {
                if(isset(self::$pdo)){
                    return self::$pdo;
                } else {
                    return self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD);
                }
            } catch (\Throwable $th) {
                echo "<h2 style='color: red'>ERRO: Não foi possível conectar ao Banco de Dados</h2>";
            }
        }
    }

?>