<?php include('config.php')?>
<?php Site::updateUsuarioOnline()?>
<?php Site::countVisitsAll()?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descrição do meu site">
    <meta name="keywords" content="Projeto, portfolio, site, landingpage">
    <meta name="author" content="Victor Bianchi">
    <title>Home - PE1</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH?>style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/082f47588d.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        echo "<target target=\"$url\">";
    ?>

    <header>
        <div class="container">
            <div class="logo left"><a href="<?php echo INCLUDE_PATH?>">Logomarca</a></div><!--logo-->
            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH?>servicos">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH?>contato">Contato</a></li>
                </ul>
            </nav><!--desktop-->
            <nav class="mobile right">
                <div class="botao-menu-mobile">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH?> sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH?> servicos">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH?> contato">Contato</a></li>
                </ul>
            </nav><!--desktop-->
            <div class="clear"></div>
        </div><!--container-->
    </header>

    <?php 
        if(file_exists('pages/'.$url.'.php')) {
            if($url == '404') {
                $e404 = true;
                include('pages/'.$url.'.php');
            } else {
                include('pages/'.$url.'.php');
            }
        } else if($url !== "depoimentos" && $url !== "servicos") {
            $e404 = true;
            include('pages/404.php');
        } else {
            include('pages/home.php');
        }
    ?>

    <footer <?php if(isset($e404) && $e404 == true) echo 'class="fixo"';?>>
        <div class="container">
            <p>Todos os direitos reservados</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="<?php echo INCLUDE_PATH?>script/script.js"></script>
</body>
</html>