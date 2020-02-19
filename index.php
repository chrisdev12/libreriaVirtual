<?php
include('includes/class/Libro.php');
$libro = new Libro();
$listaLibros = $libro->getLibros();
$itr = 0;
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.min.css">
    <title>Libreria Virtual</title>
</head>

<body>
    <nav>
    </nav>
    <main>
        <div class="container">
            <?php
            while(($datosLibros = mysqli_fetch_object($listaLibros)) && ($itr < 3)){
                $img = $libro->getLibroImg($datosLibros->id_libro);
                
                // while( $imgJ = mysq($img) ){
                //     var_dump($imgJ->ruta);
                    
                // }
                var_dump($img[0]);
                
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
            <!-- <div class="row">
                <div class="col-sm">
                    <div class="card main-books" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card main-books" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card main-books" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </main>
    <section>

    </section>
    <form method="POST">

    </form>
    <footer>

    </footer>

    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
</body>

</html>