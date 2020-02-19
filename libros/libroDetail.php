<?php
include('../includes/class/Libro.php');
$libro = new Libro();
if($_GET['id']){
    $getLibro = $libro->getLibro($_GET['id']);
    $categorias = $libro->getCategoria();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.min.css">
    <title><?php $getLibro->nom_libro ?></title>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4">
                <img class="img-fluid" src="libros/img/<?=$getLibro->nom_archivo_servidor ?>" alt="Imagen del libro">
            </div>
            <div class="col-md-8">
                <h2><?= $getLibro->nom_libro?></h2>
                <hr>
                <span class="badge badge-primary"><?=$getLibro->nom_autor?></span>
                <span class="badge badge-warning"><?=$getLibro->fec_publicacion?></span>
                <span class="badge badge-success">$ <?=$getLibro->valor ?></span>
                <span class="badge badge-info"><?=$getLibro->nom_categoria?></span>
                <p><?=$getLibro->descripcion?></p>
            </div>
        </div>
        <?php

        if(isset($_GET['id_usuario'])){
        ?>
        <div class="row mt-2">
            <div class="col-md-12">
                <h3 class="ml-3">Comentarios</h3>
                <div class="form-group">
                    <textarea class="form-control" name="comentario"></textarea>
                    <button type="button" class="btn btn-primary mt-3 float-right">Enviar comentario</button>
                </div>
            </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>


    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/bootstrap/popper.min.js"></script>
    
</body>
</html>
<?php
} else {
?>
<div class="alert alert-danger" role="alert">
        <strong>El libro que buscas no existe</strong>
</div>
<?php
} 