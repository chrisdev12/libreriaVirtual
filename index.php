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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>

<body>

    <?php
    include 'secciones/navbar.php';
    ?>

    <div id="wowslider-container1">
        <div class="ws_images">
            <ul>
                <li><img src="img/slider/devSlider/data1/images/slider1.jpg" alt="" title="" id="wows1_0" /></li>
                <li><img src="img/slider/devSlider/data1/images/slider2.jpg" alt="" title="" id="wows1_1" /></li>
                <li><img src="img/slider/devSlider/data1/images/slider3.jpg" alt="" title="" id="wows1_2" /></li>
                <li><img src="img/slider/devSlider/data1/images/slider4.jpg" alt="" title="" id="wows1_3" /></li>
            </ul>
        </div>
        <div class="ws_bullets">
            <div>
                <a href="#" title=""><span><img src="img/slider/devSlider/data1/tooltips/slider1.jpg" alt="" />1</span></a>
                <a href="#" title=""><span><img src="img/slider/devSlider/data1/tooltips/slider2.jpg" alt="" />2</span></a>
                <a href="#" title=""><span><img src="img/slider/devSlider/data1/tooltips/slider3.jpg" alt="" />3</span></a>
                <a href="#" title=""><span><img src="img/slider/devSlider/data1/tooltips/slider4.jpg" alt="" />4</span></a>
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
                    while (($datosLibros = mysqli_fetch_object($listaLibros)) && ($itr < 6)) {
                        $ruta_img_libro = $img_libro->get_ruta_principal_img_libro($datosLibros->id_libro);
                        while ($ruta = mysqli_fetch_object($ruta_img_libro)) {
                            $ruta_completa = 'http://localhost/libreriaVirtual/' . $ruta->ruta;
                            
                            if (file_exists($ruta->ruta)) {
                                $ruta_completa_v = utf8_encode($ruta_completa);
                            } else {
                                $ruta_completa_v = 'http://localhost/libreriaVirtual/libros/img_libros/404/404.png';
                            }
                            // $img = $libro->getLibroImg($datosLibros->id_libro)[0];
                            $descripcion = subStr(utf8_encode($datosLibros->descripcion), 0, 120);
                            $descripcion .= ' ...';
                            echo "
                            <div class='col-4 mt-2'>
                                <div class='card main-books flipInX wow'>
                                    <img src='$ruta_completa_v' class='card-img-top m-5' alt='...'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>".utf8_encode($datosLibros->nom_libro)."</h5>
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
    <section class="container flipInX wow">
        <hr class="my-5">
        <div class="jumbotron">
            <h4 class="display-4 flipInX wow">Echa un vistazo al resto de los libros!</h4>
            <p class="lead flipInX wow">Haciendo click en el botón de más abajo puedes acceder al resto de nuestra biblioteca. Esperamos te guste y puede que te antojes de algo!</p>
            <p class="lead">
                <a href="categorias/categorias.php" class="btn btn-primary btn-lg flipInX wow">Ver más</a>
            </p>
        </div>
    </section>

    <div class="container contact flipInX wow">
        <!-- <div class="divider"></div> -->
        <hr class="my-5">
        <h2>Contáctanos!</h2>
        <form>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre">
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" placeholder="Ingresa tu correo">
                <small id="correosub" class="form-text text-muted">No compartiremos tu dirección de correo con nadie</small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Comentario</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <?php
    include './secciones/footer.php';
    ?>


    <!-- <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="img/slider/devSlider/engine1/wowslider.js"></script>
    <script type="text/javascript" src="img/slider/devSlider/engine1/script.js"></script>
    <script src="js/animaciones_carga/wow.min.js"></script>
    <script>
            new WOW().init();
    </script>
</body>

</html>