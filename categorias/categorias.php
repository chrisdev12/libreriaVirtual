<?php

include('../includes/class/Libro.php');
$libro = new Libro;
$rom = $libro->getLibroByCategoria('Romance');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/categorias/categorias.css">
    <title>Categorias Libreria Virtual</title>
</head>

<body>
    <!-- HEADER -->
    <nav>
        <?php include('../secciones/navbar.php'); ?>
    </nav>

    <section class="contenedor-principal">
        <div class="contendor-categorias">
            <div class="contenedor-una-categoria">
                <div class="card">
                    <h2>categoria</h2>
                </div>
            </div>
            <div class="contenedor-una-categoria">
                <div class="card">
                    <h2>categoria</h2>
                </div>
            </div>
            <div class="contenedor-una-categoria">
                <div class="card">
                    <h2>categoria</h2>
                </div>
            </div>
            <div class="contenedor-una-categoria">
                <div class="card">
                    <h2>categoria</h2>
                </div>
            </div>
        </div>
    </section>



    <!-- FOOTER -->
    <footer>
        <?php include('../secciones/footer.php'); ?>
    </footer>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/bootstrap/popper.min.js"></script>
</body>

</html>