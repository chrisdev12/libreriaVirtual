<?php

session_start();
include('../includes/class/Libro.php');
include('../includes/class/class_img_libro.php');
$img_libro = new Imagen_libro();
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
        $ruta_img_libro = $img_libro->get_ruta_principal_img_libro($libros->id_libro);
            while ($ruta = mysqli_fetch_object($ruta_img_libro)) {
                $ruta_completa = 'http://localhost/libreriaVirtual/'.$ruta->ruta;
        $descripcion = subStr($libros->descripcion,0,120);  
        $descripcion .= ' ...';
        echo "
            <div class='col-sm' id='cat-flex'>
                <div class='card main-books'>
                    <img src='".utf8_encode($ruta_completa)."' class='card-img-top' alt='...'>
                    <div class='card-body col-sm-8'>
                        <h5 class='card-title'>".utf8_encode($libros->nom_libro)."</h5>
                        <span class='badge badge-success'>$ $libros->valor</span>
                        </br>
                        </br>
                        <p class='card-text'>".utf8_encode($descripcion)."</p>
                        <a href='../libros/libroDetail.php?id=$libros->id_libro' class='btn btn-primary'>Ver más</a>
                    </div>
                </div>
            </div>";
        }
    }
    ?>
</body>

</html>