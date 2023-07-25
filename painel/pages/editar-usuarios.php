<?php Painel::checkPermissionPage(1)?>

<div class="box-content">
    <h2>Editar Usuário</h2>

    <form method="post" enctype="multipart/form-data">
        <?php 
            if(isset($_POST['sbmt'])) {
                $user = new User();
                $nome = $_POST['nome'];
                $senha = $_POST['senha'];
                $image = $_FILES['img']; // Array ( [name] => Revisões.txt [full_path] => Revisões.txt [type] => text/plain [tmp_name] => C:\xampp\tmp\php2D40.tmp [error] => 0 [size] => 18 )
                $actualImage = $_POST['imagem_atual'] ?? "Não há";

                if($image['name'] != '') {
                    // Existe aqui o upload de imagem
                    if(Painel::isImgValid($image)) {
                        Painel::deleteOldImage($actualImage);
                        $image = Painel::uploadImage($image);
                        $_SESSION['img'] = $image;
                        if($user->editUser($nome, $senha, $image))
                            Painel::alert('success', 'Atualização concluída com sucesso! (Image)');
                        else
                            Painel::alert('error', 'Não foi possível alterar os dados, tente novamente mais tarde (Image)');
                    } else {
                        Painel::alert('error', 'Imagem não permitida, apenas aceitamos arquivos .JPG, .JPEG e .PNG');
                    }
                } else {
                    $image = $actualImage;
                    if($user->editUser($nome, $senha, $image))
                        Painel::alert('success', 'Atualização concluída com sucesso!');
                    else
                        Painel::alert('error', 'Não foi possível alterar os dados, tente novamente mais tarde');
                }
            }
        ?>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $_SESSION['nome']?>" required>
        </div><!--form-group-->

        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" value="<?php echo $_SESSION['password']?>" required>
        </div><!--form-group-->

        <div class="form-group">
            <label for="img">Imagem:</label>
            <input type="file" name="img" id="img">
            <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']?>">
        </div><!--form-group-->

        <input type="submit" value="Alterar" name="sbmt">
    </form>
</div><!--box-content-->