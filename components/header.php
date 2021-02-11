<?php 

$string = substr($_SERVER["PHP_SELF"], 0, 12);

if($string == "/pages/users"){
  $users = "index.php";
  $colors = "../colors/colors.php";
  $usersActive = true;
  $colorsActive = false;
}
if($string == "/pages/color"){
  $users = "../users/index.php";
  $colors = "colors.php";
  $usersActive = false;
  $colorsActive = true;
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
    <li <?php echo $usersActive ?  "class='active'" : "";?>><a href="<?php echo $users;?>">Usuários</a></li>
    <li <?php echo $colorsActive ?  "class='active'" :  "";?> ><a href="<?php echo $colors;?>">Cores</a></li>
</ul>