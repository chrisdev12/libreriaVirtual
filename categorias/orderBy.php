<?php

session_start();
include('../includes/class/Libro.php');
$libro = new Libro();
$listaLibros = $libro->getLibrosByCategoria($_GET['id']);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Categorias LibreriaVirtual</title>
    <link rel="icon" type="image/png" href="<?php echo $icon_tittle; ?>" />
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>

    <?php include '../secciones/navbar.php' ?>

    <h1>Resultados</h1>

    <?php
    while ($libros = mysqli_fetch_object($listaLibros)) {
        $img = $libro->getLibroImg($libros->id_libro)[0];
        $descripcion = subStr($libros->descripcion,0,120);  
        $descripcion .= ' ...';
        echo "
            <div class='col-sm'>
                <div class='card main-books'>
                    <img src='$img' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$libros->nom_libro</h5>
                        <span class='badge badge-success'>$libros->valor</span>
                        </br>
                        </br>
                        <p class='card-text'>$descripcion</p>
                        <a href='../libros/libroDetail.php?id=$libros->id_libro' class='btn btn-primary'>Ver más</a>
                    </div>
                </div>
            </div>";
    }
    ?>
</body>

</html>