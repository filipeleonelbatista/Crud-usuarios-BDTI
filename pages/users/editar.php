<?php

require '../../components/header.php';
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

$users = $connection->query("SELECT * FROM users where id = " . $id);

foreach ($users as $user) {
    $realname =  $user->name;
    $realemail =  $user->email;    
}

if(empty($realname) || empty($realemail)){
    escape();
}

if (isset($_POST['salvar'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $result = $connection->updateUser($name, $email, $id);
    escape();
}

?>

<div class="content">
    <section id="cadastrar">
        <div class="container">
            <h2>Editar usuário</h2>
            <form method="post" action="">
                <a tabindex="4" href="index.php">cancelar</a>

                <button tabindex="3" type="submit" name="salvar">Salvar</button>

                <input required tabindex="2" id="email" value="<?php echo $realemail; ?>" name="email" type="text" />
                <label for="email">Email</label>

                <input required tabindex="1" id="name" value="<?php echo $realname; ?>" name="name" type="text" />
                <label for="name">Nome</label>

            </form>
        </div>
    </section>
</div>


<?php
require '../../components/footer.php';
