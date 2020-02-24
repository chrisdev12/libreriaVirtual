<?php
session_start();
include('../includes/class/Libro.php');
$libro = new Libro;
$rom = $libro->getCategoria();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/categorias/categorias.css">
    <link rel="stylesheet" href="../styles/efectos_hover/hover-min.css">
    <title>Categorias Libreria Virtual</title>
</head>

<body>
    <!-- HEADER  hvr-shrink -->
    <nav>
        <?php include('../secciones/navbar.php'); ?>
    </nav>

    <section class="contenedor-principal">
        <div class="contendor-categorias">
            <?php
            while ($value  = mysqli_fetch_object($rom)) {
                echo "<div class='contenedor-una-categoria'>
                        <div class='card hvr-shrink'>
                        <a href='orderBy.php?id=$value->id_categoria' class='ancla'><h2>".utf8_encode($value->nom_categoria)."</h2><a>
                        </div>
                    </div>";
            }
            ?>
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