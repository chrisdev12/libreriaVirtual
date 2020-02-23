<?php
include('../includes/class/libro.php');
$libro = new Libro();
$listadoLibros = $libro->getLibros();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Listado libros</title>
</head>
<body>
    <section>
        <?php
        include '../navbar.php';
        ?>
    </section>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <table class="table table-bordered table-hover mt-3">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Nombre libro</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Fecha publicacion</th>
                        <th scope="col">Categoria</th>
                        <th scope="col" colspan="2">funcionalidades</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($libro = mysqli_fetch_object($listadoLibros)){
                                echo "
                                <tr>
                                    <td>$libro->id_libro</td>
                                    <td>".utf8_decode($libro->nom_autor)."</td>
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
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>