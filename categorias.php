<?php


$arr = array("key1" => "value1", "key2" => "value2");


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.min.css">
    <title>Categorias Libreria Virtual</title>
</head>

<body>
    <!-- HEADER -->
    <nav>
        <?php include('secciones/navbar.php'); ?>
    </nav>

    <div class="principal">
        <div id="side">
            SIDE
        </div>
        <div id="result">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Titulo libro</h5>
                    <p class="card-text">Descripción/información del libro.</p>
                    <a href="#" class="btn btn-primary">Más detalles</a>
                </div>
            </div>

        </div>
    </div>



    <!-- FOOTER -->
    <footer>
        <?php include('secciones/footer.php'); ?>
    </footer>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
</body>

</html>