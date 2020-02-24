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
$listaAutores = $autor->getAllAutores();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Listado autores</title>
</head>

<body>
    <section>
        <?php
        include '../secciones/navbar.php';
        ?>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">id autor</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col" colspan="2">Funcionalidades</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($autor = mysqli_fetch_object($listaAutores)){
                                echo "
                                <tr>
                                    <td>$autor->id_autor</td>
                                    <td>".utf8_encode($autor->nom_autor)."</td>
                                     <td>".utf8_encode($autor->apell_autor)."</td>
                                    <td>
                                        <a class='btn btn-warning btn-sm m-auto' href='formulario_edit_autor.php?id=$autor->id_autor'>Editar</a>
                                    </td>
                                </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
                <a href="crear_autor.php" rel="noopener noreferrer">
                    <button type="button" class="btn btn-success">Agregar nuevo autor</button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>