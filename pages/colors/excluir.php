<?php

require '../../connection.php';

function escape()
{    
    header("Location: colors.php");
    return 0;
}

$id = $_GET['id'];

if (empty($id)) {
    escape();
}

$connection = new Connection();

$result = $connection->deleteColorUser($id);
$result = $connection->deleteColor($id);


require '../../components/header.php';
?>

<div class="content">
    <section id="cadastrar">
        <div class="container">
            <?php
            if ($result == 1) {
                echo  "<h2>Cor excluida</h2>";
            } else {
                echo  "<h2>Não foi possivel excluir a cor</h2>";
            }
            ?>
            <a href="colors.php">Voltar</a>
        </div>
    </section>
</div>

<?php
require '../../components/footer.php';
