<?php 
    $usersOn = Painel::lsUsersOn();
    $sql = MySQL::connect()->prepare("SELECT * FROM `tb_admin_users_visits`");
    $sql->execute();
    $totalVisits = $sql->rowCount();

    $sql = MySQL::connect()->prepare("SELECT * FROM `tb_admin_users_visits` WHERE `date` = ?");
    $sql->execute([date('Y-m-d')]);
    $totalVisitsToday = $sql->rowCount();
?>

<div class="box-content w100">
    <div class="title">
        <h1>Painel de Controle</h1>
        <h3>Bem-vindo(a), <?php echo $_SESSION['nome'] ?>!</h3>
    </div>

    <div class="box-wraper">
        <div class="box-single">
            <h2>Usuários Online</h2>
            <p><?php echo count($usersOn)?></p>
        </div>

        <div class="box-single">
            <h2>Total de Visitas</h2>
            <p><?php echo $totalVisits?></p>
        </div>

        <div class="box-single">
            <h2>Visitas Hoje</h2>
            <p><?php echo $totalVisitsToday?></p>
        </div>
    </div><!--box-wraper-->
</div><!--box-content-->

<div class="box-content w100">
    <div class="title">
        <h1>Usuários Online</h1>
    </div>

    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>IP</span>
            </div><!--col-->

            <div class="col">
                <span>Última ação</span>
            </div><!--col-->
            <div class="clear"></div>
        </div><!--row-->

    <?php foreach ($usersOn as $key => $value) {?>

        <div class="row">
            <div class="col">
                <span><?php echo $value['ip']?></span>
            </div><!--col-->

            <div class="col">
                <span><?php echo date('d/m/Y H:i:s', strtotime($value['lastAct']))?></span>
            </div><!--col-->
            <div class="clear"></div>
        </div><!--row-->
        
    <?php }?>

    </div><!--table-responsive-->
</div>

<div class="box-content w100">
    <div class="title">
        <h1>Usuários do Painel</h1>
    </div>

    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>Username</span>
            </div><!--col-->

            <div class="col">
                <span>Cargo</span>
            </div><!--col-->
            <div class="clear"></div>
        </div><!--row-->

    <?php 
    $userPainel = MySQL::connect()->prepare('SELECT * FROM `tb_admin_usuarios`');
    $userPainel->execute();
    $userPainel = $userPainel->fetchAll();
    foreach ($userPainel as $key => $value) {?>

        <div class="row">
            <div class="col">
                <span><?php echo $value['user']?></span>
            </div><!--col-->

            <div class="col">
                <span><?php echo Painel::getCargo($value['cargo'])?></span>
            </div><!--col-->
            <div class="clear"></div>
        </div><!--row-->
        
    <?php }?>

    </div><!--table-responsive-->
</div><!--box-content-->