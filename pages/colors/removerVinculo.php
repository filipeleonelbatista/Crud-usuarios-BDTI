<?php

require '../../connection.php';

function escape()
{    
    header("Location: ../users/index.php");
    return 0;
}

$user_id = $_GET['user_id'];
$color_id = $_GET['color_id'];

if ((empty($user_id))||(empty($color_id))) {
    escape();
}

$connection = new Connection();

$result = $connection->deleteSingleColorUser($color_id, $user_id);


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
            <a href="<?php echo "../colors/vincular.php?id=" . $user_id; ?>">Voltar</a>
        </div>
    </section>
</div>

<?php
require '../../components/footer.php';
