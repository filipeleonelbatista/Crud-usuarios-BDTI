<?php 

if(str_contains($_SERVER["PHP_SELF"], 'users')){
  $users = "index.php";
  $colors = "../colors/colors.php";
}
if(str_contains($_SERVER["PHP_SELF"], 'colors')){
  $users = "../users/index.php";
  $colors = "colors.php";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.ico">
    <title>Teste de PHP</title>
</head>

<body>
    <ul class="header">
        <!-- <li>CRUD - Usuarios [PHP]</li> -->
        <li><a href="<?php echo $users;?>">Usuários</a></li>
        <li><a href="<?php echo $colors;?>">Cores</a></li>
    </ul>