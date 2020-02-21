<?php

session_start();

if($_SESSION){
   var_dump($_SESSION['user']); 
}
?>

<header>
    <nav class="navbar fixed-top  navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            LibreriaVirtual.co
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <a href="session.php">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
                </a>
                <a href="registro/registro_user.php">
                    <button class="btn btn-outline-primary ml-4 my-2 my-sm-0" type="submit">Registrar</button>
                </a>
                <button class="btn btn-outline-danger ml-4 my-2 my-sm-0" type="submit" hidden>Cerrar sesión</button>
            </div>
        </div>
    </nav>
</header>