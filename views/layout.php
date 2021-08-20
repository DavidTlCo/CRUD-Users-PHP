<?php 
    // Declare vars session
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8d4425b4c8.js" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>MVC</title>
</head>

<body>
    <div class="container-fluid">
        <h1 class="text-center py-4"><i class="fas fa-code"></i> Modelo Vista Controlador</h1>
    </div>

    <div class="container">
        <ul class="nav nav-tabs">
            <?php if (isset($_GET["page"])) : ?>
                <!-- Home -->
                <?php if ($_GET["page"] == "home") : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="inicio" href="?page=home"><i class="fas fa-home"></i> Inicio</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="inicio" href="?page=home"><i class="fas fa-home"></i> Inicio</a>
                    </li>
                <?php endif ?>

                <!-- SignIn -->
                <?php if ($_GET["page"] == "signIn") : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="?page=signIn"><i class="fas fa-file-signature"></i> Registro</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=signIn"><i class="fas fa-file-signature"></i> Registro</a>
                    </li>
                <?php endif ?>

                <!-- Login -->
                <?php if ($_GET["page"] == "login") : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="?page=login"><i class="fas fa-sign-in-alt"></i> Ingreso</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=login"><i class="fas fa-sign-in-alt"></i> Ingreso</a>
                    </li>
                <?php endif ?>

                <!-- Signout -->
                <?php if ($_GET["page"] == "signout") : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="?page=signout"><i class="fas fa-sign-out-alt"></i> Salir</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=signout"><i class="fas fa-sign-out-alt"></i> Salir</a>
                    </li>
                <?php endif ?>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="?page=home"><i class="fas fa-home"></i>  Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=signIn"><i class="fas fa-file-signature"></i>  Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="ingreso" href="?page=login"><i class="fas fa-sign-in-alt"></i>  Ingreso</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=signout"><i class="fas fa-sign-out-alt"></i>  Salir</a>
                </li>
            <?php endif ?>
        </ul>
    </div>

    <div class="container p-5">
        <?php
        // isset(): Determina si una variables está definida y no es NULL
        if (isset($_GET['page'])) {
            if (
                $_GET["page"] == "home"
                || $_GET["page"] == "signIn"
                || $_GET["page"] == "login"
                || $_GET["page"] == "signout"
                || $_GET["page"] == "edit"
            ) {
                include "views/pages/" . $_GET["page"] . ".php";
            }else{
                include "views/pages/404.php";
            }
        } else {
            include "views/pages/login.php";
        }
        ?>
    </div>
</body>

</html>