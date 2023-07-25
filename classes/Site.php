<?php 
    class Site
    {
        public static function updateUsuarioOnline()
        {
            try {
                if(isset($_SESSION['online'])) {
                    $token = $_SESSION['online']; // nunca se altera
                    $horarioAtual = date('Y-m-d H:i:s');
    
                    $sql = MySQL::connect()->prepare('UPDATE `tb_admin_users_on` SET `lastAct` = ? WHERE `token` = ?');
                    $sql->execute([$horarioAtual, $token]);
                } else {
                    $_SESSION['online'] = uniqid();
                    $token = $_SESSION['online'];
                    $horarioAtual = date('Y-m-d H:i:s');
                    $ip = $_SERVER['REMOTE_ADDR'];
    
                    $sql = MySQL::connect()->prepare('INSERT INTO `tb_admin_users_on` VALUES (null, ?, ?, ?)');
                    $sql->execute([$ip, $horarioAtual, $token]);
                }
            } catch (\Throwable $th) {
                echo "ERRO!";
                echo $th;
            }
        }

        public static function countVisitsAll()
        {
            if(!isset($_COOKIE['visit'])) {
                setcookie('visit', 'true', time() + (60*60*24)); // 1 dia
                $sql = MySQL::connect()->prepare("INSERT INTO `tb_admin_users_visits` VALUES (null, ?, ?)");
                $sql->execute([$_SERVER['REMOTE_ADDR'], date('Y-m-d H:i:s')]);
            }
        }
    }
?>