<?php

require '../../components/header.php';
require '../../connection.php';


$connection = new Connection();

$users = $connection->query("SELECT * FROM users ORDER BY id");



if (isset($_POST['salvar'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $result = $connection->insertUser($name, $email);
}

?>

<div class="content">
    <section id="cadastrar">
        <div class="container">
            <h2>Cadastro de usuário</h2>
            <form method="post" action="">
                <button tabindex="3" type="submit" name="salvar">Salvar</button>

                <input required tabindex="2" id="email" name="email" type="text" />
                <label for="email">Email</label>

                <input required tabindex="1" id="name" name="name" type="text" />
                <label for="name">Nome</label>

            </form>
        </div>
    </section>

    <section id="listar">
        <div class="list-container">
            <h2>Lista de usuário</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {

                        echo sprintf(
                            "<tr>
                                <td>%s</td>
                                <td>%s</td>
                                <td>%s</td>
                                <td>
                                    <a href='%s'><img src='../../assets/images/edit.svg' width='28' alt='Editar'/></a>
                                    <a href='%s'><img src='../../assets/images/minus.svg'  width='28' alt='Excluir'/></a>
                                    <a href='%s'><img src='../../assets/images/colour.svg'  width='28' alt='Vincular Cor'/></a>
                                </td>
                            </tr>",
                            $user->id,
                            $user->name,
                            $user->email,
                            "editar.php?id=" . $user->id,
                            "excluir.php?id=" . $user->id,
                            "../colors/vincular.php?id=" . $user->id,
                        );
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</div>


<?php
require '../../components/footer.php';
