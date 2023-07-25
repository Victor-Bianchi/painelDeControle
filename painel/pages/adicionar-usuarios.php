<?php Painel::checkPermissionPage(1)?>

<div class="box-content">
    <h2>Adicionar Usuários</h2>

    <form method="post" enctype="multipart/form-data">
        <?php 
            if(isset($_POST['sbmt'])) {
                $nome = $_POST['nome'];
                $usuario = $_POST['user'];
                $senha = $_POST['senha'];
                $image = $_POST['img'] ?? '';
                $cargo = $_POST['cargo'];

                if($nome == '') 
                    Painel::alert('error', 'O nome completo do usuário não pode estar vazio!');
                else if($usuario == '')
                    Painel::alert('error', 'O nome de usuário não pode estar vazio!');
                else if($senha == '')
                    Painel::alert('error', 'A senha não pode estar vazia!');
                else if ($cargo == '')
                    Painel::alert('error', 'O cargo do usuário é obrigatório!');
                else {
                    if($image != '') {
                        if(Painel::isImgValid($image) == false)
                        Painel::alert('error', 'Imagem não permitida, apenas aceitamos arquivos .JPG, .JPEG e .PNG');
                    } else {
                        if(User::Exists($usuario))
                            Painel::alert('error', 'O usuário '.$usuario.' já existe na base de dados');
                        else {
                            $user = new User();
                            $user->createUser($usuario, $senha, $image, $nome, $cargo);
                            Painel::alert('success', 'Cadastro do usuário '.$usuario.' criado com sucesso'); 
                        }
                    }
                    
                }
            }
        ?>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </div><!--form-group-->

        <div class="form-group">
            <label for="user">Usuário:</label>
            <input type="text" name="user" id="user" required>
        </div><!--form-group-->

        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
        </div><!--form-group-->

        <div class="form-group">
            <label for="img">Imagem:</label>
            <input type="file" name="img" id="img">
        </div><!--form-group-->

        <div class="form-group">
            <label for="cargo">Cargo:</label>
            <select name="cargo" id="cargo">
                <option value="0">Cliente</option>
                <option value="1">Gerente</option>
            </select>
        </div><!--form-group-->

        <input type="submit" value="Adicionar" name="sbmt">
    </form>
</div><!--box-content-->