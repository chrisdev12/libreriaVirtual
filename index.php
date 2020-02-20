<html lang="es">
<?php
include('includes/class/Libro.php');
$libro = new Libro();
$listaLibros = $libro->getLibros();
$itr = 0;
require_once 'config.php';
?>


<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="icon" type="image/png" href="<?php echo $icon_tittle; ?>" />
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="img/slider/devSlider/engine1/style.css" />
</head>



<body>

    <?php
    include 'navbar.php';
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
            <br>

            <div class="container">

                <?php
                while (($datosLibros = mysqli_fetch_object($listaLibros)) && ($itr < 3)) {
                    $img = $libro->getLibroImg($datosLibros->id_libro);
                    echo "<div class='row'>
                        <div class='col-sm'>
                            <div class='card main-books' style='width: 18rem;'>
                                <img src='$img[0]' class='card-img-top' alt='...'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$datosLibros->nom_libro</h5>
                                    <p class='card-text'>$datosLibros->descripcion</p>
                                    <a href='#' class='btn btn-primary'>Ver más</a>
                                </div>
                            </div>
                        </div>";
                    $itr++;
                }
                ?>
            </div>
    </main>
    <section>

    </section>
    <form method="POST">

    </form>
    <?php
    include './secciones/footer.php';
    ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <script type="text/javascript" src="img/slider/devSlider/engine1/wowslider.js"></script>
    <script type="text/javascript" src="img/slider/devSlider/engine1/script.js"></script>
</body>

</html>