<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: http://localhost/libreriaVirtual/session.php");
}
include('../includes/class/libro.php');
include('../includes/class/class_img_libro.php');


$libro = new Libro();
$listadoLibros = $libro->getLibros();

$img_libro = new Imagen_libro();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Listado libros</title>
</head>

<style>
.imgLibro {
    width: 30px;
    height: 30px;
}
</style>

<body>

    <?php
    include '../secciones/navbar.php';
    ?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">img</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Nombre libro</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Fecha publicacion</th>
                            <th scope="col">Categoria</th>
                            <th scope="col" colspan="2">Funcionalidades</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($libro = mysqli_fetch_object($listadoLibros)) {
                            $ruta_img_libro = $img_libro->get_ruta_principal_img_libro($libro->id_libro);
                            while ($ruta = mysqli_fetch_object($ruta_img_libro)) {
                                $ruta_completa = 'http://localhost/libreriaVirtual/'.$ruta->ruta;
                                if(file_exists(substr($ruta->ruta,7))){
                                    $ruta_completa_v = $ruta_completa;
                                }else{
                                    $ruta_completa_v = 'http://localhost/libreriaVirtual/libros/img_libros/404/404.png';
                                }
                                echo "
                                    <tr>
                                        <td>$libro->id_libro</td>
                                        <td><img class='imgLibro' src='$ruta_completa_v'></td>
                                        <td>" . utf8_decode($libro->nom_autor) . "</td>
                                        <td>$libro->nom_libro</td>
                                        <td>$libro->valor</td>
                                        <td>$libro->fec_publicacion</td>
                                        <td>$libro->nom_categoria</td>
                                        <td>
                                            <a class='btn btn-warning btn-sm m-auto' href='formulario_edit_libro.php?id=$libro->id_libro'>Editar</a>
                                            <a class='btn btn-danger btn-sm m-auto' href='eliminar_libro.php?id=$libro->id_libro'>Eliminar</a>
                                        </td>
                                    </tr>
                                    ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <a href="formulario_add_libro.php" target="_blank" rel="noopener noreferrer">
                    <button type="button" class="btn btn-success">Agregar libro</button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>