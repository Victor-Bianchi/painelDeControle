<?php 
    if(isset($_POST['sbmt']) && $_POST['identificador'] == 'form_home') { # isso evita que outros formulários sejam carregados sem necessidade
        if($_POST['email'] !== '') {
            # Para fazer validações de e-mail podemos usar expressões regulares ou funções nativas do PHP, como a filter_var
            $email = $_POST['email'];
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<script>alert("É um e-mail válido!")</script>';
            } else {
                echo '<script>alert("É um e-mail inválido!")</script>';
            }
        } else {
            echo '<script>alert("Campos vazios não são permitidos")</script>';
        }
    }
?>

<section class="banner-principal">
        <div class="overlay"></div>
        <div class="container">
            <form method="post">
                <h2>Qual o seu melhor e-mail?</h2>
                <input type="email" name="email" id="email" placeholder="seu@email.com" required>
                <input type="hidden" name="identificador" value="form_home">
                <input type="submit" value="Cadastrar" name="sbmt">
            </form>
        </div><!--container-->
    </section><!--banner-principal-->

    <section class="descricao-autor">
        <div class="container">
            <div class="w50 left">
                <h2>Mary A. Simpson</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam soluta illum qui nisi alias maiores, nam iste accusamus earum maxime molestias suscipit labore ex aliquid ab modi quas quidem dolorem! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat, doloribus et quidem atque dolor nostrum soluta nesciunt repudiandae maiores ea? Nesciunt unde quaerat vitae numquam placeat cum? A, explicabo quidem!</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus nemo reprehenderit ut quisquam architecto libero, accusantium fugiat corporis iste? Fugiat quia beatae quidem exercitationem aliquid, maxime ut laudantium suscipit officia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat perferendis laudantium repellat placeat impedit nostrum quas! A aspernatur cupiditate tenetur nulla facere, delectus iste quasi voluptatum deserunt laudantium nemo provident!</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus nemo reprehenderit ut quisquam architecto libero, accusantium fugiat corporis iste? Fugiat quia beatae quidem exercitationem aliquid, maxime ut laudantium suscipit officia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat perferendis laudantium repellat placeat impedit nostrum quas! A aspernatur cupiditate tenetur nulla facere, delectus iste quasi voluptatum deserunt laudantium nemo provident!</p>
            </div><!--w50-->

            <div class="w50 right">
                <img class="right" src="<?php echo INCLUDE_PATH?>images/user.jpg" alt="imagem do usuário">
            </div><!--w50-->
            <div class="clear"></div>
        </div><!--container-->
    </section><!--descricao-autor-->

    <section class="especialidades">
        <div class="container">
            <h2 class="title">Especialidades</h2>
            <div class="box-especialidade left w33">
                <h3 class="fa-brands fa-css3"></h3>
                <h3>CSS3</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda doloribus rerum quo sit beatae deserunt cupiditate consequatur. Inventore, sunt expedita! Tempore eum porro quidem iusto! Suscipit odit tenetur libero omnis.</p>
            </div><!--box-especialidade-->

            <div class="box-especialidade left w33">
            <h3 class="fa-brands fa-html5"></h3>
                <h3>HTML5</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda doloribus rerum quo sit beatae deserunt cupiditate consequatur. Inventore, sunt expedita! Tempore eum porro quidem iusto! Suscipit odit tenetur libero omnis.</p>
            </div><!--box-especialidade-->

            <div class="box-especialidade left w33">
            <h3 class="fa-brands fa-square-js"></h3>
                <h3>JavaScript</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda doloribus rerum quo sit beatae deserunt cupiditate consequatur. Inventore, sunt expedita! Tempore eum porro quidem iusto! Suscipit odit tenetur libero omnis.</p>
            </div><!--box-especialidade-->
            <div class="clear"></div>
        </div><!--container-->
    </section><!--especialidades-->

    <section class="extras">
        <div class="container">
            <div class="w50 depo-cont left">
                <h2 class="title depoimentos">Depoimentos</h2>
                <div class="depoimento-single">
                    <q class="depoimento-descricao">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae corporis nostrum aut totam autem fuga veritatis quod mollitia natus provident. Vel recusandae voluptas voluptate laborum harum veniam rerum ad incidunt.</q>
                    <p class="nome-autor">John Smith</p>
                </div><!--depoimento-single-->

                <div class="depoimento-single">
                    <q class="depoimento-descricao">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae corporis nostrum aut totam autem fuga veritatis quod mollitia natus provident. Vel recusandae voluptas voluptate laborum harum veniam rerum ad incidunt.</q>
                    <p class="nome-autor">Lary Duck</p>
                </div><!--depoimento-single-->

                <div class="depoimento-single">
                    <q class="depoimento-descricao">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae corporis nostrum aut totam autem fuga veritatis quod mollitia natus provident. Vel recusandae voluptas voluptate laborum harum veniam rerum ad incidunt.</q>
                    <p class="nome-autor">Lisa Lee</p>
                </div><!--depoimento-single-->
            </div><!--w50-->

            <div class="w50 serv-cont right">
                <h2 class="title">Serviços</h2>
                <div class="servicos">
                    <ul>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, doloremque harum. Perferendis, eos officia voluptates doloremque, expedita odio magnam dolorem quam mollitia reprehenderit beatae ipsum. Incidunt dolorem nemo voluptatibus repellat.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, doloremque harum. Perferendis, eos officia voluptates doloremque, expedita odio magnam dolorem quam mollitia reprehenderit beatae ipsum. Incidunt dolorem nemo voluptatibus repellat.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, doloremque harum. Perferendis, eos officia voluptates doloremque, expedita odio magnam dolorem quam mollitia reprehenderit beatae ipsum. Incidunt dolorem nemo voluptatibus repellat.</li>
                    </ul>
                </div><!--servicos-->
            </div><!--w50-->
            <div class="clear"></div>
        </div><!--container-->
    </section><!--extras-->