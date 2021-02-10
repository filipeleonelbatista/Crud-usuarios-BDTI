<?php

require '../../connection.php';

function escape()
{    
    header("Location: index.php");
    return 0;
}

$id = $_GET['id'];

if (empty($id)) {
    escape();
}

$connection = new Connection();

$result = $connection->deleteColorsUser($id);
$result = $connection->deleteUser($id);

require '../../components/header.php';
?>

<div class="content">
    <section id="cadastrar">
        <div class="container">
            <?php
            if ($result == 1) {
                echo  "<h2>Usuário excluido</h2>";
            } else {
                echo  "<h2>Não foi possivel excluir usuario</h2>";
            }
            ?>
            <a href="index.php">Voltar</a>
        </div>
    </section>
</div>

<?php
require '../../components/footer.php';
