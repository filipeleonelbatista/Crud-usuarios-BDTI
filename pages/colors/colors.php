<?php

require '../../components/header.php';
require '../../connection.php';


$connection = new Connection();

$colors = $connection->query("SELECT * FROM colors ORDER BY id");



if (isset($_POST['salvar'])) {
    $name = $_POST['name'];
    $result = $connection->insertColor($name);
}

?>

<div class="content">
    <section id="cadastrar">
        <div class="container">
            <h2>Cadastrar cor</h2>
            <form method="post" action="">
                <button type="submit" name="salvar">Salvar</button>

                <input required id="name" name="name" type="text" />
                <label for="name">Nome</label>

            </form>
        </div>
    </section>

    <section id="listar">
        <div class="list-container">
            <h2>Lista de cores</h2>
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
                                    <a href='%s'><img src='../../assets/images/edit.svg' width='28' alt='Editar'/></a>
                                    <a href='%s'><img src='../../assets/images/minus.svg'  width='28' alt='Excluir'/></a>
                                </td>
                            </tr>",
                            $color->id,
                            $color->name,
                            "editar.php?id=" . $color->id,
                            "excluir.php?id=" . $color->id,
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
