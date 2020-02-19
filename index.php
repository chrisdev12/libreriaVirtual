<?php
include('includes/class_bd.php');
$database = new Database();
$prueba = $database->conectar();
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
=======
>>>>>>> 18b6e4417b6c00202b125d86f9a25755e6e3a209
    <link rel="stylesheet" href="./styles/index/styles.css">
    <title>Libreria Virtual</title>
</head>

<body>
    <nav>
        <?php include("./secciones/navbar.php"); ?>
    </nav>
    <main>
        <div id="wowslider-container1">
            <div class="ws_images">
                <ul>
                    <li>
                        <img src="img/index/images/1.jpg" alt="" title="" id="wows1_0" />
                    </li>
                    <li>
                        <img src="img/index/images/2.jpg" alt="" title="" id="wows1_1" />
                    </li>
                    <li>
                        <img src="img/index/images/3.jpg" alt="" title="" id="wows1_2" />
                    </li>
                    <li>
                        <img src="img/index/images/4.png" alt="" title="" id="wows1_3" />
                    </li>
                </ul>
            </div>
            <div class="ws_bullets">
                <div>
                    <a href="#" title="">
                        <span>
                            <img src="img/index/tooltips/1.jpg" alt="" />
                            1
                        </span>
                    </a>
                    <a href="#" title="">
                        <span>
                            <img src="img/index/tooltips/2.jpg" alt="" />
                            2
                        </span>
                    </a>
                    <a href="#" title="">
                        <span>
                            <img src="img/index/tooltips/3.jpg" alt="" />
                            3
                        </span>
                    </a>
                    <a href="#" title="">
                        <span>
                            <img src="img/index/tooltips/4.png" alt="" />
                            4
                        </span>
                    </a>
                </div>
            </div>
            <div class="ws_shadow"></div>
        </div>
    </main>
    <section>

    </section>
    <form method="POST">

    </form>
    <footer>
        <?php include("./secciones/footer.php"); ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="js/wowslider.js"></script>
</body>

</html>