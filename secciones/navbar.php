<?php
session_start();
?>

<header>
    <nav class="navbar fixed-top  navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            LibreriaVirtual.co
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" hidden></a>
                </li>
            </ul>
            <div>
                <?php
                if (!isset($_SESSION['user'])) {
                ?>
                    <a href="session.php">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
                    </a>
                    <a href="registro/registro_user.php">
                        <button class="btn btn-outline-primary ml-4 my-2 my-sm-0" type="submit">Registrar</button>
                    </a>

                <?php
                } elseif (isset($_SESSION['user'])) {
                ?>
                    <a href="http://localhost/libreriaVirtual/includes/class/logout.php">
                        <button class="btn btn-outline-danger ml-4 my-2 my-sm-0" type="submit">Cerrar sesión</button>
                    </a>
                <?php
                }
                ?>



                <!--  -->
            </div>
        </div>
    </nav>
</header>