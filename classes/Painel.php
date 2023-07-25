<?php 

class Painel
{
    public static $cargos = ['Cliente', 'Gerente','Administrador'];
    
    public static function isLogin() 
    {
        return isset($_SESSION['login']) ? true : false;
    }

    public static function logout() 
    {
        session_destroy();
        header('Location: '.INCLUDE_PATH_PAINEL);
    }

    public static function getCargo($cargo) 
    {
        return self::$cargos[$cargo];
    }

    public static function carregarPagina() 
    {
        if(isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
            if(file_exists('pages/'.$url[0].'.php')) {
                include('pages/'.$url[0].'.php');
            } else {
                header('Location: '.INCLUDE_PATH_PAINEL);
            }
        } else {
            include('pages/home.php');
        }
    }

    public static function clearUsersOn()
    {
        $date = date('Y-m-d H:i:s');
        $sql = MySQL::connect()->exec("DELETE FROM `tb_admin_users_on` WHERE `lastAct` < '$date' - INTERVAL 5 MINUTE"); // se a hora registrada no DB for menor que 1 minuto da hora atual
        unset($_SESSION['online']);
    }

    public static function lsUsersOn()
    {
        self::clearUsersOn();
        $sql = MySQL::connect()->prepare("SELECT * FROM `tb_admin_users_on`");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function alert($type, $msg)
    {
        if($type == 'success') 
        {
            echo "<div class='box-alert success'><i class='fa-solid fa-check'></i> $msg</div>";
        } else if ($type = 'error') 
        {
            echo "<div class='box-alert error'><i class='fa-solid fa-xmark'></i> $msg</div>";
        }
    }

    public static function isImgValid(Array $imagem): bool
    {
        if($imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/jpg' || $imagem['type'] == 'image/png')
            # Um extra é a validação de tamanho de imagem usando o $image['size'] onde temos o valor em bytes, podendo converter em KB usando a divisão por 1024
            return true;
        else 
            return false;
    }

    public static function uploadImage(Array $imagem): mixed
    {
        $archiveExtension = explode('.', $imagem['name']);
        $imageName = uniqid().'.'.$archiveExtension[count($archiveExtension) - 1]; # para pegar o último
        if(move_uploaded_file($imagem['tmp_name'], INCLUDE_PATH_NO_URL.'\painel\uploads\\'.$imageName))
            # tmp_name é um local onde o PHP armazena os arquivos temporários que são colocados na seleção
            return $imagem['name'];
        else
            return false;
    }

    public static function deleteOldImage(mixed $OldImage)
    {
        @unlink('uploads/'.$OldImage);
    }

    public static function selectedMenu(string $selection)
    {
        $url = explode('/', @$_GET['url'])[0]; # ou seja, o primeiro parâmetro depois do /
        if ($url == $selection) {
            echo 'class="menu-active"';
        }
    }

    public static function checkPermissionMenu(int $position)
    {
        if((int) $_SESSION['cargo'] >= $position) {
            return;
        } else {
            echo 'style="display:none"';
        }
    }

    public static function checkPermissionPage(int $position)
    {
        if((int) $_SESSION['cargo'] >= $position) {
            return;
        } else {
            include('../painel/pages/403.php');
        }
    }
}
?>