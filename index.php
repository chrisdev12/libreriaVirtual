<?php
include_once('includes/class/class_user.php');
include('includes/class/Libro.php');
include('includes/class/class_img_libro.php');
$libro = new Libro();
$listaLibros = $libro->getLibros();
$img_libro = new Imagen_libro();
$itr = 0;
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LibreriaVirtual.co</title>
    <link rel="icon" type="image/png" href="<?php echo $icon_tittle; ?>" />
    <link rel="stylesheet" type="text/css" href="styles/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="img/slider/devSlider/engine1/style.css" />
    <link rel="stylesheet" type="text/css" href="styles/index.css" />
</head>

<body>

    <?php
    include 'secciones/navbar.php';
    ?>

    <div id="wowslider-container1">
        <div class="ws_images">
            <ul>
                <li><img src="img/slider/devSlider/data1/images/1.jpg" alt="" title="" id="wows1_0" /></li>
                <li><img src="img/slider/devSlider/data1/images/2.jpg" alt="" title="" id="wows1_1" /></li>
                <li><img src="img/slider/devSlider/data1/images/3.jpg" alt="" title="" id="wows1_2" /></li>
                <li><img src="img/slider/devSlider/data1/images/4.png" alt="" title="" id="wows1_3" /></li>
            </ul>
        </div>
        <div class="ws_bullets">
            <div>
                <a href="#" title=""><span><img src="img/slider/devSlider/data1/tooltips/1.jpg" alt="" />1</span></a>
                <a href="#" title=""><span><img src="img/slider/devSlider/data1/tooltips/2.jpg" alt="" />2</span></a>
                <a href="#" title=""><span><img src="img/slider/devSlider/data1/tooltips/3.jpg" alt="" />3</span></a>
                <a href="#" title=""><span><img src="img/slider/devSlider/data1/tooltips/4.png" alt="" />4</span></a>
            </div>
        </div>
        <div class="ws_shadow"></div>
    </div>
    <main>
        <div class="container">
            <br>
            <div class="container">
                <div class='row'>

                    <?php
                    while (($datosLibros = mysqli_fetch_object($listaLibros)) && ($itr < 3)) {
                        $ruta_img_libro = $img_libro->get_ruta_principal_img_libro($datosLibros->id_libro);
                        while ($ruta = mysqli_fetch_object($ruta_img_libro)) {
                            $ruta_completa = 'http://localhost/libreriaVirtual/'.$ruta->ruta;
                        if(file_exists(substr($ruta->ruta,7))){
                            $ruta_completa_v = $ruta_completa;
                        }else{
                            $ruta_completa_v = 'http://localhost/libreriaVirtual/libros/img_libros/404/404.png';
                        }
                        // $img = $libro->getLibroImg($datosLibros->id_libro)[0];
                        $descripcion = subStr($datosLibros->descripcion,0,120);
                        $descripcion .= ' ...';
                        echo "
                            <div class='col-sm'>
                                <div class='card main-books'>
                                    <img src='$ruta_completa_v' class='card-img-top' alt='...'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$datosLibros->nom_libro</h5>
                                        <span class='badge badge-success'>$datosLibros->valor</span>
                                        </br>
                                        </br>
                                        <p class='card-text'>$descripcion</p>
                                        <a href='libros/libroDetail.php?id=$datosLibros->id_libro' class='btn btn-primary'>Ver más</a>
                                    </div>
                                </div>
                            </div>";
                        $itr++;
                    }
                }
                    ?>
                </div>
            </div>
    </main>
    <section>

    </section>
    <form method="POST">

    </form>
    <?php
    include './secciones/footer.php';
    ?>


    <!-- <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="img/slider/devSlider/engine1/wowslider.js"></script>
    <script type="text/javascript" src="img/slider/devSlider/engine1/script.js"></script>
</body>

</html>