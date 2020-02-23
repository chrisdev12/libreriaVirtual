<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="http://localhost/libreriaVirtual/styles/styles.css">
<div class="conteiner">
    <nav class="navbar fixed-top  navbar-expand-lg navbar-dark bg-dark barraNav">
        <a class="navbar-brand mr-5" href="http://localhost/libreriaVirtual/">
            <img src="http://localhost/libreriaVirtual/img/icon.png" width="30" height="30" alt="">&nbsp;LibreriaVirtual
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/libreriaVirtual/session.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/libreriaVirtual/libros/formulario_add_libro.php">Libros</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php
                if (!isset($_SESSION['user'])) {
                ?>
                    <li class="mr-3">
                        <a href="session.php">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-user mr-2"></i>Ingreso</button>
                        </a>
                    </li>
                    <li>
                        <a href="registro/registro_user.php">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-user-plus mr-2"></i>Registrar</button>
                        </a>
                    </li>
                <?php
                } elseif (isset($_SESSION['user'])) {
                ?>
                    <li style="color: #ffffff">
                    Bienvenido: <b><?php echo $_SESSION['user']?></b>
                        <a href="http://localhost/libreriaVirtual/includes/class/logout.php">
                        
                            <button class="btn btn-outline-light ml-4 my-2 my-sm-0" type="submit">Cerrar sesión</button>
                        </a>
                    </li>

                <?php
                }
                ?>
            </ul>
        </div>
    </nav>
</div>