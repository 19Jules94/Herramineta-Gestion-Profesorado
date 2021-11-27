<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/login.css">
</head>

<body>
    <?php
    $t = true;
    if ($t == false) {
    ?>
        <header>
            <div id="header">
                <ul class="nav">
                    <li><a href="" class="sbm">Inicio</a></li>

                    <li id="iniciar-ses" style="float:right"><a href="login.html" id="in-ses">Iniciar Sesion</a></li>

                </ul>
            </div>
        </header>
    <?php
    } else {
    ?>
        <?php
        include'modal_auth.php';
        ?>
    <?php
    }
    ?>