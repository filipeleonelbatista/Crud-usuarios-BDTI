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

require '../../components/header.php';

if (isset($_POST['deletar'])) {
    $result = $connection->deleteSingleColorUser($color_id, $user_id);

    ?>
        <div class="content">
            <section id="cadastrar">
                <div class="container">
                    <?php
                    if ($result == 1) {
                        echo  "<h2>Cor desvinculada</h2>";
                    } else {
                        echo  "<h2>Não foi possivel desvincular a cor</h2>";
                    }
                    ?>
                    <a href="<?php echo "../colors/vincular.php?id=" . $user_id; ?>">Voltar</a>
                </div>
            </section>
        </div>
    <?php
}else{
    ?>
        <div class="content">
            <section id="cadastrar">
                <div class="container">
                    <h2>Deseja desvincular esta cor</h2>
                    <form method="post" action="">                
                        <button tabindex="1" type="submit" name="deletar">Desvincular</button>
                    </form>
                    <a href="<?php echo "../colors/vincular.php?id=" . $user_id; ?>">Voltar</a>    
                </div>
            </section>
        </div>
    <?php
}

require '../../components/footer.php';