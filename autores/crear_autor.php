<?php

include('../includes/class/class_autor.php');

session_start();
if (!isset($_SESSION['user'])) {
    header("location: http://localhost/libreriaVirtual/session.php");
}
require_once '../includes/class/class_bd.php';
require '../includes/class/class_util.php';
require '../config.php';

$autor = new Autor();

if(isset($_POST) && !empty($_POST)){
    $crearAutor = $autor->crearAutor($_POST);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/png" href="<?php echo $icon_tittle; ?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/estilo_form_libros.css">
</head>

<body>
    <section>
        <?php
        include '../secciones/navbar.php';
        ?>
    </section>

    <section>
        <div class="fluid-container">
            <div class="row justify-content-md-center" style="margin: 20px 0 0; padding: 10px">
                <div class="col-md-6">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nom_autor">Nombre Autor</label>
                            <input type="text" class="form-control" name="nom_autor" id="nom_autor"
                                aria-describedby="emailHelp" placeholder="Nombre autor">
                        </div>
                        <div class="form-group">
                            <label for="apell_autor">Apellido Autor</label>
                            <input type="text" class="form-control" name="apell_autor" id="apell_autor"
                                placeholder="Apellidos autor">
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section>
        <?php
        include '../secciones/footer.php';
        ?>
    </section>
    <script src="https://bionalmedicalandpets.com/subdominios/zoon.bionalmedicalandpets.com/js/jquery/jquery.min.js">
    </script>
    <script src="../js/bootstrap/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>