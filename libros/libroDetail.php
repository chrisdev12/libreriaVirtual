<?php
session_start();
include_once('../includes/class/Libro.php');
include_once('../includes/class/Comentario.php');
include('../includes/class/class_img_libro.php');
include_once('../includes/class/class_bd.php');

$database = new Database();
$libro = new Libro();
$comentario = new Comentario();
$img_libro = new Imagen_libro();
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
                <?php
                    $img_libro = "SELECT ruta FROM tb_img_libro where id_libro = ".$_GET['id'] ." and principal = true";
                    $ruta = mysqli_query($database->conectar(),$img_libro);
                    mysqli_close($database->conectar());
                    while($ruta_completa = mysqli_fetch_array($ruta)){
                        
                        $ruta_v = substr($ruta_completa['ruta'],7);
                        if(file_exists($ruta_v)){
                            $ruta_v = utf8_encode($ruta_v);
                        } else {
                            $ruta_v = "http://localhost/libreriaVirtual/libros/img_libros/404/404.png";
                        }
                    }
                    echo "<img class='img-fluid' src='$ruta_v' alt='Imagen del libro'>";
                    
                ?>
                
            </div>
            <div class="col-md-8">
                <h2><?= utf8_encode($getLibro->nom_libro) ?></h2>
                <hr>
                <?php
                    $fecha_libro = $getLibro->fec_publicacion;
                    ?>
                <span class="badge badge-primary"><?= utf8_encode($getLibro->nom_autor) ?></span>
                <span class="badge badge-warning"><?= substr($fecha_libro, 0, 10) ?></span>
                <span class="badge badge-success">$ <?= $getLibro->valor ?></span>
                <span class="badge badge-info"><?= $getLibro->nom_categoria ?></span>
                <h2>Sinopsis</h2>
                <p><?= utf8_encode($getLibro->descripcion) ?></p>
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