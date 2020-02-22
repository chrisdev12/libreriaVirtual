<?php

include('includes/class/Libro.php');
$libro = new Libro;

$libros = $libro->getLibroByCategoria('1');
function mostrarLibro($datos_libro)
{
    $img = (new Libro)->getLibroImg($datos_libro->id_libro)[0];
    $descripcion = subStr($datos_libro->descripcion, 0, 120);
    $descripcion .= ' ...';
    echo "<div class='col-sm'>
            <div class='card main-books'>
                <img src='$img' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$datos_libro->nom_libro</h5>
                    <span class='badge badge-success'>$datos_libro->valor</span>
                    </br>
                    </br>
                    <p class='card-text'>$descripcion</p>
                    <a href='libros/libroDetail.php?id=$datos_libro->id_libro' class='btn btn-primary'>Ver más</a>
                </div>
            </div>
        </div>";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="styles/categorias.css">
    <title>Categorias Libreria Virtual</title>
</head>

<body>
    <!-- HEADER -->
    <nav>
        <?php include './secciones/navbar.php'; ?>
    </nav>

    <div class="principal">
        <div id="side">

        </div>

        <div id="result">
            <?php
            while ($datos_libro = mysqli_fetch_object($libros)) {
                mostrarLibro($datos_libro);
            }
            ?>
        </div>
    </div>



    <!-- FOOTER -->
    <footer>
        <?php include('secciones/footer.php'); ?>
    </footer>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script>
        document.querySelectorAll('.collapse').collapse()
    </script>
</body>

</html>