<?php 

    class User
    {
        public function editUser($nome, $senha, $imagem)
        {
            $sql = MySQL::connect()->prepare('UPDATE `tb_admin_usuarios` SET nome = ?, password = ?, image = ? WHERE user = ?');
            if($sql->execute([$nome, $senha, $imagem, $_SESSION['user']]))
                return true;
            else 
                return false;
        }

        public static function Exists($user)
        {
            $sql = MySQL::connect()->prepare('SELECT `id` FROM `tb_admin_usuarios` WHERE `user` = ?');
            $sql->execute([$user]);
            if($sql->rowCount() == 1) {
                return true;
            } else {
                return false;
            }
        }

        public static function createUser(string $user, string $senha, string $image, string $nome, int $cargo)
        {
            $sql = MySQL::connect()->prepare('INSERT INTO `tb_admin_usuarios` VALUES (null, ?, ?, ?, ?, ?)');
            $sql->execute([$user, $senha, $image, $nome, $cargo]);
        }
    }
?>