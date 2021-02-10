<?php

require '../../components/header.php';
require '../../connection.php';

function escape()
{
    header("Location: vincular.php");
    return 0;
}

$id = $_GET['id'];

if (empty($id)) {
    escape();
}

$connection = new Connection();

$users = $connection->query("SELECT * FROM users where id = " . $id);

$colors = $connection->query("SELECT * FROM user_colors uc INNER JOIN colors c on(uc.color_id = c.id) WHERE uc.user_id = " . $id . " ORDER BY uc.color_id");

$colorList = $connection->query("SELECT * FROM colors");

foreach ($users as $user) {
    $username =  $user->name;
}

if (empty($username)) {
    escape();
}

if (isset($_POST['salvar'])) {
    $colors = $_POST['colors'];
    $result = $connection->insertColorUser($colors, $id);

    $colors = $connection->query("SELECT * FROM user_colors uc INNER JOIN colors c on(uc.color_id = c.id) WHERE uc.user_id = " . $id);
}

?>

<div class="content">
    <section id="cadastrar">
        <div class="container">
            <h2>Vincular cor</h2>
            <form method="post" action="">
                <a tabindex="3" href="../../index.php">cancelar</a>

                <button tabindex="2" type="submit" name="salvar">Salvar</button>

                <select required tabindex="1" name="colors" id="colors">
                    <option selected="selected" disabled value="">Selecione uma cor</option>
                    <?php
                    foreach ($colorList as $color) {
                        echo sprintf("<option value='%s'>%s</option>", $color->id, $color->name);
                    }
                    ?>
                </select>
                <label for="name">Nome</label>

            </form>
        </div>
    </section>
    <section id="listar">
        <div class="list-container">
            <h2>Cores vinculadas ao usuário: <?php echo $username; ?></h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($colors as $color) {

                        echo sprintf(
                            "<tr>
                                <td>%s</td>
                                <td>%s</td>
                                <td>
                                    <a href='%s'><img src='../../assets/images/minus.svg'  width='28' alt='Excluir'/></a>
                                </td>
                            </tr>",
                            $color->color_id,
                            $color->name,
                            "removerVinculo.php?color_id=" . $color->color_id . "&user_id=" . $id,
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
