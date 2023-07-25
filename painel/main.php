<?php 

    if(isset($_GET['logout'])) {
        Painel::logout();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PE1 - Painel de Controle</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/082f47588d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="menu-aside" id="aside">
        <div class="box-usuario">
            <?php 
                if($_SESSION['img'] == '' || $_SESSION['img'] == null) {
            ?>
                <div class="avatar-usuario">
                    <i class="fa-solid fa-user"></i>
                </div><!--avatar-->
            <?php } else { ?>
                <div class="avatar-usuario">
                    <img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $_SESSION['img']?>" alt="imagem do usuário">
                </div><!--imagem-->
            <?php } ?>
                
            <div class="nome-usuario">
                <p><?php echo $_SESSION['nome']?></p>
                <p><?php echo Painel::getCargo($_SESSION['cargo'])?></p>
            </div><!--nome-user-->
        </div><!--box-usuario-->

        <div class="menu-menu">
            <p class="title-menu">Cadastro</p>
            <p <?php Painel::selectedMenu('cadastrar-depoimento');?>><a href="<?php INCLUDE_PATH_PAINEL?>cadastrar-depoimento">Cadastrar Depoimento</a></p>
            <p <?php Painel::selectedMenu('cadastrar-servico');?>><a href="">Cadastrar Serviço</a></p>
            <p class="title-menu">Gestão</p>
            <p <?php Painel::selectedMenu('listar-depoimentos');?>><a href="">Listar Depoimentos</a></p>
            <p <?php Painel::selectedMenu('listar-servicos');?>><a href="">Listar Serviços</a></p>
            <p class="title-menu" <?php Painel::checkPermissionMenu(1)?>>Administração do Painel</p>
            <p <?php Painel::selectedMenu('editar-usuarios');?> <?php Painel::checkPermissionMenu(1)?>><a href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuarios">Editar Usuários</a></p>
            <p <?php Painel::selectedMenu('adicionar-usuarios');?> <?php Painel::checkPermissionMenu(1)?>><a href="<?php INCLUDE_PATH_PAINEL?>adicionar-usuarios"">Adicionar Usuários</a></p>
            <p class="title-menu" <?php Painel::checkPermissionMenu(1)?>>Geral</p>
            <p <?php Painel::selectedMenu('editar');?> <?php Painel::checkPermissionMenu(1)?>><a href="">Editar</a></p>
            <p <?php Painel::selectedMenu('sessao-ativa');?> <?php Painel::checkPermissionMenu(1)?>><a href="">Sessão Ativa</a></p>
        </div><!--menu-menu-->

    </div><!--menu-aside-->

    <header>
        <div class="center">
            <div class="menu-btn" id="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </div>

            <div class="logout">
                <a href="<?php echo INCLUDE_PATH_PAINEL?>"><i class="fa-solid fa-home"></i></a>
                <a href="<?php echo INCLUDE_PATH_PAINEL?>?logout"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>

            <div class="clear"></div>
        </div><!--center-->
    </header>

    <div class="content" id="content">
        <?php Painel::carregarPagina()?>
    </div>

    <script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
</body>
</html>