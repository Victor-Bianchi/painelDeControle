<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/082f47588d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="box-login">
        <?php 
            if(isset($_POST['sbmt'])) {
                $user = $_POST['user'];
                $passwd = $_POST['passwd'];
                $sql = MySQL::connect()->prepare('SELECT * FROM tb_admin_usuarios WHERE user = ? AND password = ?');
                $sql->execute([$user, $passwd]);

                if($sql->rowCount() == 1) {
                    $info = $sql->fetch();
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $user;
                    $_SESSION['password'] = $passwd;
                    $_SESSION['cargo'] = $info['cargo'];
                    $_SESSION['nome'] = $info['nome'];
                    $_SESSION['img'] = $info['image'];
                    header('Location: '.INCLUDE_PATH_PAINEL);
                    die();
                } else {
                    die("Usuário ou senha incorretos");
                }
            }
        ?>
        <h2>Login</h2>
        <form method="post">
            <input type="text" name="user" placeholder="username" required>
            <input type="password" name="passwd" placeholder="password" required>
            <input type="submit" name="sbmt" value="Entrar">
        </form>
    </div><!--box-login-->
</body>
</html>