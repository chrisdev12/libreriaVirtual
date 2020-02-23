<?php
session_start();
include_once('../includes/class/Libro.php');
include_once('../includes/class/Comentario.php');

$libro = new Libro();
$comentario = new Comentario();
if (isset($_POST) && !empty($_POST)) {
    $comentario->guardarComentario($_GET['id'], $_POST);
}
if ($_GET['id']) {
    $getLibro = $libro->getLibro($_GET['id']);
    $categorias = $libro->getCategoria();
    $getComentarios = $comentario->getComentarios($_GET['id']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.min.css">
    <title><?php $getLibro->nom_libro ?></title>
</head>

<body>
    <?php include('../secciones/navbar.php'); ?>
    <br>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4">
                <img class="img-fluid" src="libros/img/<?= $getLibro->nom_archivo_servidor ?>" alt="Imagen del libro">
            </div>
            <div class="col-md-8">
                <h2><?= $getLibro->nom_libro ?></h2>
                <hr>
                <?php
                    $fecha_libro = $getLibro->fec_publicacion;
                    ?>
                <span class="badge badge-primary"><?= $getLibro->nom_autor ?></span>
                <span class="badge badge-warning"><?= substr($fecha_libro, 0, 10) ?></span>
                <span class="badge badge-success">$ <?= $getLibro->valor ?></span>
                <span class="badge badge-info"><?= $getLibro->nom_categoria ?></span>
                <h2>Sinopsis</h2>
                <p><?= $getLibro->descripcion ?></p>
            </div>
        </div>
        <?php
            if (isset($_SESSION['user'])) {
            ?>
        <div class="container">
            <div class="row mt-2">
                <div class="col-md-12">
                    <h3 class="ml-3">Comentarios</h3>
                    <form method="POST">
                        <div class="form-group">
                            <textarea class="form-control" name="comentario"></textarea>
                            <button class="btn btn-primary mt-3 float-right">Enviar comentario</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            }
            if ($getComentarios) {
                while ($comentario = mysqli_fetch_object($getComentarios)) {
                    $fecha_comentario = $comentario->fec_cre;
                    echo "<div class='card mt-3'>
                <div class='card-body'>
                  <h5 class='card-title'>Publicado el: " . substr($fecha_comentario, 0, 10) . " </h5>
                  <p class='card-text'>$comentario->comentario</p>
                </div>
              </div>";
                }
            }
                ?>
        </div>
    </div>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/bootstrap/popper.min.js"></script>

    <?php include('../secciones/footer.php'); ?>
</body>

</html>
<?php
} else {
?>
<!-- <div class="alert alert-danger" role="alert">
        <strong>El libro que buscas no existe</strong>
</div> -->
<?php
}

?>