<?php

require '../../components/header.php';
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

$colors = $connection->query("SELECT * FROM colors where id = " . $id);

foreach ($colors as $color) {
    $colorname =  $color->name;    
}

if(empty($colorname)){
    escape();
}

if (isset($_POST['salvar'])) {
    $name = $_POST['name'];
    $result = $connection->updateColor($name, $id);
    escape();
}

?>

<div class="content">
    <section id="cadastrar">
        <div class="container">
            <h2>Editar cor</h2>
            <form method="post" action="">
                <a tabindex="3" href="../../index.php">cancelar</a>

                <button tabindex="2" type="submit" name="salvar">Salvar</button>

                <input required tabindex="1" id="name" value="<?php echo $colorname; ?>" name="name" type="text" />
                <label for="name">Nome</label>

            </form>
        </div>
    </section>
</div>


<?php
require '../../components/footer.php';
