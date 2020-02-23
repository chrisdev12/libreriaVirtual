<?php
include('../includes/class/class_autor.php');

session_start();
if (!isset($_SESSION['user'])) {
    header("location: http://localhost/libreriaVirtual/session.php");
}
require_once '../includes/class/class_bd.php';
require '../includes/class/class_util.php';
require '../config.php';

if(isset($_GET['id'])){
    $autor = new Autor();
    $getAutor = $autor->getAutorById($_GET['id']);
    if(isset($_POST) && !empty($_POST)){
        $update = $autor->updateAutorById($_GET['id'],$_POST);
        if($update){
            header('Location: admin_listado_autores.php');
        } else {
            echo "Error en la actualizacion";
        }
    }
} else{
    header('location: admin_listado_autores.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Editar Autor</title>
</head>

<body>

    <?php
    include '../secciones/navbar.php';
    ?>
    <section>
        <div class="fluid-container">
            <div class="row justify-content-md-center" style="margin: 20px 0 0; padding: 10px">
                <div class="col-md-6">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nom_autor">Nombre del autor</label>
                            <input type="text" class="form-control" name="nom_autor" id="nom_autor"
                                value="<?=$getAutor->nom_autor?>" aria-describedby="emailHelp"
                                placeholder="Nombre autor">
                            <label for="apell_autor">Apellido del autor</label>
                            <input type="text" class="form-control" name="apell_autor" id="apell_autor"
                                value="<?=$getAutor->apell_autor?>" aria-describedby="emailHelp"
                                placeholder="Apellido autor">
                        </div>
                        <button class="btn btn-primary">Actualizar autor</button>
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