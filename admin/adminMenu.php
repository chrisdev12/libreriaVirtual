    <?php
    include_once('../includes/class/class_user.php');
        session_start();
        if (!isset($_SESSION['user'])) {
            header("location: http://localhost/libreriaVirtual/session.php");
        }
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../styles/styles.css">
        <title>Menu administrador</title>
    </head>

    <body>
        <?php
        include_once('../secciones/navbar.php');
        
        ?>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6">
                    <a href="../libros/admin_listado_libros.php">
                        <div class="opcion_menu ">
                            <h2 class="naranja">Libros</h2>
                            <p>Aquí encontraras toda la información y utilidad sobre los libros</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="../autores/autores_form.php">
                        <div class="opcion_menu verde">
                            <h2 class="verde">Autores</h2>
                            <p>Aquí encontraras toda la información y utilidad sobre los autores</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 azul">
                    <a href="../categorias/categorias_form.php">
                        <div class="opcion_menu">
                            <h2 class="azul">Categorias</h2>
                            <p>Aquí encontraras toda la información y utilidad sobre los categorias</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>





        <script src="../js/bootstrap/bootstrap.min.js"></script>
        <script src="../js/bootstrap/popper.min.js"></script>

    </body>

    </html>