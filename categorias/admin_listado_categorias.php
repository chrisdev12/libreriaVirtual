<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: http://localhost/libreriaVirtual/session.php");
}
include('../includes/class/libro.php');


$libro = new Libro();
$listadoCategorias = $libro->getCategoria();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Listado categorias</title>
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
                            <th scope="col">id</th>
                            <th scope="col">Categoria</th>
                            <th scope="col" colspan="2">Funcionalidades</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($categoria = mysqli_fetch_object($listadoCategorias)){
                                echo "
                                <tr>
                                    <td>$categoria->id_categoria</td>
                                    <td>".utf8_decode($categoria->nom_categoria)."</td>
                                    <td>
                                        <a class='btn btn-warning btn-sm m-auto' href='formulario_edit_categoria.php?id=$categoria->id_categoria'>Editar</a>
                                        <a class='btn btn-danger btn-sm m-auto' href='eliminar_categoria.php?id=$categoria->id_categoria'>Eliminar</a>
                                    </td>
                                </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
                <a href="formulario_add_categoria.php" rel="noopener noreferrer">
                    <button type="button" class="btn btn-success">Agregar nueva categoria</button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>