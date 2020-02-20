<?php
include('../includes/class/Libro.php');
include('../includes/class/class_libro_foto.php');
$libro = new Libro();
$libroFoto = new libroFoto();

$libro_categoria = $libro->getCategoria();
$libro_autor = $libro->getAutores();

if (isset($_POST) && !empty($_POST)) {
    $libro->guardarLibro($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/png" href="<?php echo $icon_tittle; ?>" />
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="img/slider/devSlider/engine1/style.css" />
</head>

<body>
    <section>
        <?php
        include '../navbar.php';
        ?>
    </section>

    <main>
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-6 card" style="margin: 20px 0 0; padding: 10px">
                    <div>
                        <h3>Crear Nuevo Libro</h3>
                    </div>
                    <form method="POST">
                        <div class="form-group">
                            <label>Autor:</label>
                            <select class="form-control" id="idAutor" name="id_autor">
                                <?php
                                while ($value = mysqli_fetch_object($libro_autor)) {
                                    echo "<option value='$value->id_autor'>$value->persona</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nombre del libro:</label>
                            <input type="text" class="form-control" id="nomLibro" name="nom_libro" placeholder="Ej: Gabriel Garcia">
                        </div>
                        <div class="form-group">
                            <label>Precio:</label>
                            <input type="number" class="form-control" id="valor" name="valor" placeholder="Ej: 124.000">
                        </div>
                        <div class="form-group">
                            <label>Descripcion:</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" cols="1" rows="2">
                        </textarea>
                        </div>
                        <div class="form-group">
                            <label>Fecha:</label>
                            <input type="date" class="form-control" name="fecha_publicacion" id="fecha_publicacion">
                        </div>
                        <div class="form-group">
                            <label>Categoria:</label>
                            <select class="form-control" id="idCategoria" name="id_categoria">
                                <?php
                                while ($value  = mysqli_fetch_object($libro_categoria)) {
                                    var_dump($value->id_categoria);
                                    echo "<option value='$value->id_categoria'>$value->nom_categoria</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <input type="hidden" id="id_usuario" name="id_usuario" value="1">
                        <button class="btn btn-success">CREAR</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <section>
        <?php
        include '../secciones/footer.php';
        ?>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/bootstrap/popper.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="img/slider/devSlider/engine1/wowslider.js"></script>
    <script type="text/javascript" src="img/slider/devSlider/engine1/script.js"></script>
</body>

</html>